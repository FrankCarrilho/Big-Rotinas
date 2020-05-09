<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rotinas extends CI_Model
{
    public function store()
    {
        $data = $this->input->post();
        $data['rotinas'] = implode(', ', $data['rotinas']);
        return $this->db->insert('usuarios', $data);
    }

    public function update($id)
    {
        if (!$this->get($id)) return false;
        $data = $this->input->post();
        $data['rotinas'] = implode(', ', $data['rotinas']);
        $this->db->where('id', $id);
        return $this->db->update('usuarios', $data);
    }

    public function getRotinas()
    {
        return $this->db->get("rotinas")->result();
    }

    public function get($id = null)
    {
        if ($id) {
            return $this->db->get_where('usuarios', ['id' => trim(strip_tags($id))])->row();
        }
        return $this->db->get("usuarios")->result();

    }

    public function destroy($id)
    {
        if (!$this->get($id)) return false;
        $this->db->where('id', $id);
        return $this->db->delete('usuarios');
    }
} 