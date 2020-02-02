<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conhecimentos extends CI_Controller {
	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('Dados')){
			redirect('home','refresh');
		}
	}

	private function atualizaBanco(){
		$this->load->library('migration');

		if ($this->migration->current() === FALSE){
			show_error($this->migration->error_string());
		}
	}

	public function index()	{
		$this->atualizaBanco();
		$data = array(
			'title' => 'Conhecimentos',
			'menu' => 'conhecimento',
			'stylesheets' => array(
				'template/dashboard.css',
			),
			'scripts' => array(
				'util.js',
				'conhecimentos.js'
			),
			'modals' => array(
				'modal_conhecimento')
		);

		$this->template->showDashboard('conhecimentos', $data);
	}

	public function listar(){
		$this->load->model('conhecimentos_model');
		$json['data'] = array();

		$resultado = $this->conhecimentos_model->getConhecimentos();

		foreach ($resultado as $item) {
			array_push($json['data'], array(
				'id' => $item->id,
				'nome_linguagem' => $item->nome_linguagem,
				'tempo_experiencia' => $item->tempo_experiencia,
				'porcentagem_experiencia' => $item->porcentagem_experiencia,
				'mostrar_curriculo' => ($item->mostrar_curriculo == 0) ? 'NÃO' : 'SIM',
				'acao' => '<button type="button" class="btn btn-link btn-sm" onclick="javascript:editar('.$item->id.')"><i class="fas fa-edit"></i></button>&nbsp;<button type="button" class="btn btn-link btn-sm text-danger" onclick="javascript:deletar('.$item->id.')"><i class="fas fa-trash"></i></button>',
			));
		}

		echo json_encode($json);
	}

	public function visualizar($id) {

		$this->load->model('conhecimentos_model');
		$json = $this->conhecimentos_model->getConhecimento($id);

		echo json_encode($json);
	}

	public function salvar() {
		$json['type'] = 'success';
		$json['title'] = 'Dados alterados com sucesso';

		$valor = $this->input->post();

		$this->load->model('conhecimentos_model');
		$resultado = $this->conhecimentos_model->setConhecimento($valor);

		if($resultado == 0){
			$json['type'] = 'error';
			$json['title'] = 'Dados nao atualizados';
		}

		echo json_encode($json);
	}

	public function deletar($id){
		$json['type'] = 'success';
		$json['title'] = 'Linguagem detada com sucesso';

		$this->load->model('conhecimentos_model');
		$result = $this->conhecimentos_model->delConhecimento($id);

		if($result == 0){
			$json['type'] = 'error';
			$json['title'] = 'Linguagem não deletada';
		}

		echo json_encode($json);
	}
}
?>