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
			'stylesheets' => array(
				'template/dashboard.css'
			),
			'scripts' => array(
				'util.js',
				'conhecimentos.js'
			)
		);

		$this->template->showDashboard('conhecimentos', $data);
	}

	public function listar(){
		$this->load->model('conhecimentos_model');
		$json['data'] = array();
		$valor = $_GET['filtro'];

		$resultado = $this->conhecimentos_model->getConhecimentos($valor);

		foreach ($resultado as $item) {
			array_push($json['data'], array(
				$item->id,
				$item->nome_linguagem,
				$item->tempo_experiencia,
				$item->porcentagem_experiencia,
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

		$json = array();
		$json['status'] = 1;
		$json['error_list'] = array();

		$valor=$this->input->post();

		//print_r($valor);


		if (empty($valor['nome_linguagem'])) {
			$json['status'] = 0;
		}elseif (empty($valor['tempo_experiencia'])) {
			$json['status'] = 0;
		}elseif (empty($valor['porcentagem_experiencia'])) {
			$json['status'] = 0;
		}else {
			$this->load->model('conhecimentos_model');
			$id = $this->conhecimentos_model->setConhecimento($valor);

			if($id == 0){
				$json['status'] = 0;
			}
		}

		if ($json['status'] == 0) {
				$json['error_list'] = "Cadastro não realizado, informe ou reveja todos os dados.";
			}

		echo json_encode($json);
	}

	public function deletar($id) {

		$json = array();
		$json['status'] = 1;
		$json['error_list'] = array();

		$this->load->model('conhecimentos_model');
		$result = $this->conhecimentos_model->delConhecimento($id);

		print_r($result);

		if($result == 0){
			$json['status'] = 0;
		}

		if ($json['status'] == 0) {
			$json['error_list'] = "Algo deu errado";
		}

		echo json_encode($json);
	}

}
?>