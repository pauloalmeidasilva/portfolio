<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Postagens extends CI_Controller {

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
			'title' => 'Postagens',
			'menu' => 'postagem',
			'stylesheets' => array(
				'template/dashboard.css',
			),
			'scripts' => array(
				'util.js',
				'postagem.js',
			),
			'modals' => array()
		);

		$this->template->showDashboard('postagem', $data);
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

}
?>