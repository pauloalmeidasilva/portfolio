<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conhecimentos extends CI_Controller {
	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('Dados')){
		 	redirect('home','refresh');
		}
	}

	public function index()	{
		$data = array(
			'stylesheets' => array(
				'dashboard.css'
			),
			'scripts' => array(
				'util.js',
				'conhecimentos.js'
			)
		);

		$this->template->show('conhecimentos', $data);
	}

	public function listar() {

		if(isset($_POST['search-nome'])){
			$valor = $_POST['search-nome'];
		}else{
			$valor = "";
		}

		$this->load->model('conhecimentos_model');
		$dados = $this->conhecimentos_model->getConhecimentos($valor);

		$json = '<table class="table table-hover text-center"><thead><tr><th scope="col">Código</th><th scope="col">Nome</th><th scope="col">Tempo de Experiência</th><th>Experiência em %</th><th scope="col">Ações</th></tr></thead><tbody>';

		foreach ($dados as $valor) {
			$json .= '<tr id="tr'.$valor->id.'"><th>'.$valor->id.'</th><td>'.$valor->nome_linguagem.'</td><td>'.$valor->tempo_experiencia.'</td><td>'.$valor->porcentagem_experiencia.'%</td><td><button type="button" id="btn-edit" class="btn btn-info" data-toggle="modal" data-target="#modal-cad" data-id="'.$valor->id.'"><i class="fas fa-edit"></i></button> <button type="button" id="btn-delete" class="btn btn-danger" data-toggle="modal" data-target="#modal-del" data-id="'.$valor->id.'" data-nome="'.$valor->nome_linguagem.'"><i class="fas fa-trash-alt"></i></button></td></tr>';
		}

		$json .= '</tbody><tfoot><tr><th scope="col">Código</th><th scope="col">Nome</th><th scope="col">Tempo de Experiência</th><th>Experiência em %</th><th scope="col">Ações</th></tr></tfoot></table>';

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