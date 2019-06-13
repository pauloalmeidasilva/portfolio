<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formacao extends CI_Controller {
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
				'formacao.js'
			)
		);

		$this->template->show('formacoes', $data);
	}

	public function listar() {

		if(isset($_POST['search-curso'])){
			$valor = $_POST['search-curso'];
			$campo = $_POST['campo'];
		}else{
			$valor = null;
			$campo = null;
		}

		$this->load->model('formacao_model');
		$dados = $this->formacao_model->getformacoes($campo,$valor);

		$json = '<table class="table table-hover text-center"><thead><tr><th scope="col">Código</th><th scope="col">Curso</th><th scope="col">Instituição</th><th>Início</th><th>Termino</th><th scope="col">Ações</th></tr></thead><tbody>';

		foreach ($dados as $valor) {
			$json .= '<tr><th>'.$valor->id.'</th><td>'.$valor->nome_curso.'</td><td>'.$valor->local.'</td><td>'.$valor->ano_inicio.'</td><td>'.$valor->ano_fim.'</td><td><button type="button" id="btn-edit" class="btn btn-info" data-toggle="modal" data-target="#modal-cad" data-id="'.$valor->id.'"><i class="fas fa-edit"></i></button> <button type="button" id="btn-delete" class="btn btn-danger" data-toggle="modal" data-target="#modal-del" data-id="'.$valor->id.'" data-nome="'.$valor->nome_curso.'"><i class="fas fa-trash-alt"></i></button></td></tr>';
		}

		$json .= '</tbody><tfoot><tr><th scope="col">Código</th><th scope="col">Curso</th><th scope="col">Instituição</th><th>Início</th><th>Termino</th><th scope="col">Ações</th></tr></tfoot></table>';

		echo json_encode($json);
	}

	public function visualizar($id) {

		$this->load->model('formacao_model');
		$json = $this->formacao_model->getFormacao($id);

		echo json_encode($json);
	}

	public function salvar() {

		$json = array();
		$json['status'] = 1;
		$json['error_list'] = array();

		$valor=$this->input->post();

		if (empty($valor['nome_curso'])) {
			$json['status'] = 0;
		}elseif (empty($valor['local'])) {
			$json['status'] = 0;
		}elseif (empty($valor['ano_inicio'])) {
			$json['status'] = 0;
		}elseif (empty($valor['ano_fim'])) {
			$json['status'] = 0;
		}elseif (empty($valor['descricao'])) {
			$json['status'] = 0;
		}else {
			$this->load->model('formacao_model');
			$id = $this->formacao_model->setFormacao($valor);

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

		$this->load->model('formacao_model');
		$result = $this->formacao_model->delFormacao($id);
		print_r($id);
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