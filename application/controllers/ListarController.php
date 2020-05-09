<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ListarController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Rotinas');

    }

    public function index()
    {
        $page = [
            'titulo' => 'Formulário &raquo; Listar',
            'resultados' => $this->Rotinas->get()
        ];
        $this->load->view('show', $page);
    }

}

?>