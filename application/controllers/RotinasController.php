<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class RotinasController extends CI_Controller
{
    private $dados;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        $this->load->library('session');
        $this->load->library('table');
        $this->load->library('user_agent');
        $this->load->model('Rotinas');
        $this->dados = [
            'titulo' => 'Formulário',

            'perfis' => [
                'aux' => 'Auxiliar',
                'aux_adm' => 'Auxiliar Administrativo',
                'aux_comercial' => 'Auxiliar Comercial',
                'aux_cotabil' => 'Auxiliar Contabil',
                'aux_fiscal' => 'Auxiliar Fiscal',
                'aux_financeiro' => 'Auxiliar Financeiro',
                'aux_ti' => 'Auxiliar de TI',
                'aux_loja' => 'Auxiliar de Loja',
                'analista_fin' => 'Analista Financeiro',
                'analista_con' => 'Analista Contabil',
                'analista_log' => 'Analista Logistica',
                'assist' => 'Assistente Administrativo',
                'assist_fiscal' => 'Assistente Fiscal',
                'assist_contabil' => 'Assistente Contabil',
                'assist_rh' => 'Assistente RH',
                'coorde_adm' => 'Coordenador Administrativo',
                'coorde_comercial' => 'Coordenador Comercial',
                'coordenador' => 'Coordenador de TI',
                'diretor' => 'Diretor',
                'fiscais' => 'Fiscais de Caixa',
                'ger_adm' => 'Gerente Administrativo',
                'ger_comercial' => 'Gerente Comercial',
                'ger_fin' => 'Gerente Financeiro',
                'ger_log' => 'Gerente de Logistica',
                'ger_loja' => 'Gerente de Loja',
                'ger_vend' => 'Gerente de Vendas',
                'logistica' => 'Logistica',
                'subgerente' => 'Subgerente',
                'supervisor' => 'Supervisor',
                'super_ti' => 'Supervisor de TI',
                'super_loja' => 'Supervisor de Loja',
                'super_comercial' => 'Supervisor Comercial',
                'tec' => 'Técnico',
                'tec_adm' => 'Técnico Administrativo',
                'tec_fin' => 'Técnico Financeiro',
                'vend' => 'Vendedor Interno',
                'vend_ex' => 'Vendedor Externo',
                'vend_tkm' => 'Vendedor Telemarketing',
                'recepcionista' => 'Recepcionista'
            ],

            'setores' => [
                'adm' => 'Administrativo',
                'ent_notas' => 'Entrada de Notas',
                'control' => 'Controladoria'
            ],
        ];
    }

    public function index()
    {
        $rotinas = $this->Rotinas->getRotinas();
        $this->load->view('index', $this->dados + ['listaRotinas' => $rotinas]);
    }

    public function store()
    {
        $page = array();
        if ($this->input->post()) {
            $this->form_validation->set_rules('codigo', 'Codigo', 'trim|required|numeric');
            $this->form_validation->set_rules('nome', 'Nome', 'required|trim');
            $this->form_validation->set_rules('perfil', 'Perfil', 'trim|required');
            $this->form_validation->set_rules('setor', 'Setor', 'trim|required');
            $this->form_validation->set_rules('rotinas[]', 'Rotinas', 'trim|required|numeric');

            if ($this->form_validation->run() == FALSE) {
                $page['msg'] = [
                    'type' => 'error',
                    'text' => validation_errors()
                ];
            } else {
                if ($this->Rotinas->store()) {
                    $page['msg'] = [
                        'type' => 'success',
                        'text' => "Dados salvos com sucesso"
                    ];
                } else {
                    $page['msg'] = [
                        'type' => 'error',
                        'text' => "Erro ao cadastrar"
                    ];

                }
            }
        }

        $this->session->set_flashdata('msg', $page['msg']);
        redirect($this->agent->referrer(), 'refresh');
    }


    public function edit()
    {
        $dadosRotina = $this->Rotinas->get($this->uri->segment(3));
        if (!$dadosRotina) {
            $page['msg'] = [
                'type' => 'error',
                'text' => "Falha na busca dos dados do formulario de rotinas"
            ];
            $this->session->set_flashdata('msg', $page['msg']);
            redirect($this->agent->referrer(), 'refresh');
        }
        $rotinas = $this->Rotinas->getRotinas();
        $this->load->view('index', $this->dados + ['listaRotinas' => $rotinas, 'infoFormRotina' => $dadosRotina]);
    }

    public function update()
    {
        $dadosRotina = $this->Rotinas->get($this->uri->segment(3));
        $page = array();
        if ($this->input->post() && $dadosRotina) {
            $this->form_validation->set_rules('codigo', 'Codigo', 'trim|required|numeric');
            $this->form_validation->set_rules('nome', 'Nome', 'required|trim');
            $this->form_validation->set_rules('perfil', 'Perfil', 'trim|required');
            $this->form_validation->set_rules('setor', 'Setor', 'trim|required');
            $this->form_validation->set_rules('rotinas[]', 'Rotinas', 'trim|required|numeric');

            if ($this->form_validation->run() == FALSE) {
                $page['msg'] = [
                    'type' => 'error',
                    'text' => validation_errors()
                ];
            } else {
                if ($this->Rotinas->update($this->uri->segment(3))) {
                    $page['msg'] = [
                        'type' => 'success',
                        'text' => "Dados atualizados com sucesso"
                    ];
                } else {
                    $page['msg'] = [
                        'type' => 'error',
                        'text' => "Erro ao cadastrar"
                    ];
                }
            }
            $this->session->set_flashdata('msg', $page['msg']);
            redirect($this->agent->referrer(), 'refresh');
        }
        $page['msg'] = [
            'type' => 'error',
            'text' => "Falha na busca dos dados do formulario de rotinas"
        ];
        $this->session->set_flashdata('msg', $page['msg']);
        redirect($this->agent->referrer(), 'refresh');
    }

    public function destroy()
    {
        $dadosRotina = $this->Rotinas->destroy($this->uri->segment(3));
        $page['msg'] = $dadosRotina ? [
            'type' => 'success',
            'text' => 'Excluido com sucesso'
        ] : [
            'type' => 'error',
            'text' => "Falha ao excluir"
        ];
        $this->session->set_flashdata('msg', $page['msg']);
        redirect($this->agent->referrer(), 'refresh');
    }

}

?>