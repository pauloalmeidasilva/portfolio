<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Experiencia extends CI_Controller {
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
				'experiencia.js'
			)
		);

		$this->template->show('experiencia', $data);
	}

	public function listar() {

		if(isset($_POST['search-exp'])){
			$valor = $_POST['search-exp'];
			$campo = $_POST['campo'];
		}else{
			$valor = null;
			$campo = null;
		}

		$this->load->model('experiencia_model');
		$dados = $this->experiencia_model->getExperiencias($campo,$valor);

		$json = '<table class="table table-hover text-center"><thead><tr><th scope="col">Código</th><th scope="col">Curso</th><th scope="col">Instituição</th><th>Início</th><th>Termino</th><th scope="col">Ações</th></tr></thead><tbody>';

		foreach ($dados as $valor) {
			$json .= '<tr><th>'.$valor->id.'</th><td>'.$valor->nome_profissao.'</td><td>'.$valor->local.'</td><td>'.$valor->ano_inicio.'</td><td>'.$valor->ano_fim.'</td><td><button type="button" id="btn-edit" class="btn btn-info" data-toggle="modal" data-target="#modal-cad" data-id="'.$valor->id.'"><i class="fas fa-edit"></i></button> <button type="button" id="btn-delete" class="btn btn-danger" data-toggle="modal" data-target="#modal-del" data-id="'.$valor->id.'" data-nome="'.$valor->nome_profissao.'"><i class="fas fa-trash-alt"></i></button></td></tr>';
		}

		$json .= '</tbody><tfoot><tr><th scope="col">Código</th><th scope="col">Curso</th><th scope="col">Instituição</th><th>Início</th><th>Termino</th><th scope="col">Ações</th></tr></tfoot></table>';

		echo json_encode($json);
	}

	public function visualizar($id) {

		$this->load->model('experiencia_model');
		$json = $this->experiencia_model->getExperiencia($id);

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
			$this->load->model('experiencia_model');
			$id = $this->experiencia_model->setExperiencia($valor);

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

		$this->load->model('experiencia_model');
		$result = $this->experiencia_model->delExperiencia($id);
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