<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Controller {
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
			'title' => 'Cursos Extracurriculares',
			'menu' => 'curso',
			'stylesheets' => array(
				'template/dashboard.css'
			),
			'scripts' => array(
				'util.js',
				'curso.js'
			),
			'modals' => array(
				'modal_curso')
		);

		$this->template->showDashboard('cursos', $data);
	}

	public function listar(){
		$this->load->model('curso_model');
		$json['data'] = array();

		$resultado = $this->curso_model->getCursos();

		foreach ($resultado as $item) {
			array_push($json['data'], array(
				'id' => $item->id,
				'nome' => $item->nome,
				'duracao' => $item->duracao,
				'mostrar_curriculo' => ($item->mostrar_curriculo == 0) ? 'NÃO' : 'SIM',
				'acao' => '<button type="button" class="btn btn-link btn-sm" onclick="javascript:editar('.$item->id.')"><i class="fas fa-edit"></i></button>&nbsp;<button type="button" class="btn btn-link btn-sm text-danger" onclick="javascript:deletar('.$item->id.')"><i class="fas fa-trash"></i></button>',
			));
		}

		echo json_encode($json);
	}

	public function visualizar($id) {

		$this->load->model('formacao_model');
		$json = $this->formacao_model->getFormacao($id);

		echo json_encode($json);
	}

	public function salvar() {
		$json['type'] = 'success';
		$json['title'] = 'Dados alterados com sucesso';

		$valor = $this->input->post();

		$this->load->model('curso_model');
		$id = $this->curso_model->setCurso($valor);

		if($id == 0){
			$json['type'] = 'error';
			$json['title'] = 'Dados nao atualizados';
		}

		echo json_encode($json);
	}

	public function deletar($id) {
		$json['type'] = 'success';
		$json['title'] = 'Formação Acadêmica detada com sucesso';

		$this->load->model('formacao_model');
		$result = $this->formacao_model->delFormacao($id);

		if($result == 0){
			$json['type'] = 'error';
			$json['title'] = 'Formação Acadêmica não deletada';
		}

		echo json_encode($json);
	}

}
?>