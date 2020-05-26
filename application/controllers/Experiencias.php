<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Experiencias extends CI_Controller {
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
			'title' => 'Experiência Profissional',
			'menu' => 'experiencia',
			'stylesheets' => array(
				'template/dashboard.css'
			),
			'scripts' => array(
				'util.js',
				'experiencia.js'
			),
			'modals' => array(
				'modal_trabalho')
		);

		$this->template->showDashboard('experiencia', $data);
	}

	public function listar() {
		$this->load->model('experiencia_model');
		$json['data'] = array();

		$resultado = $this->experiencia_model->getExperiencias();

		foreach ($resultado as $item){
			$termino = ($item->atual == 1) ? 'Atual' : $item->termino;
			array_push($json['data'], array(
				'id' => $item->id,
				'cargo' => $item->cargo,
				'empresa' => $item->empresa,
				'inicio' => $item->inicio,
				'termino' => $termino,
				'mostrar_curriculo' => ($item->mostrar_curriculo == 0) ? 'NÃO' : 'SIM',
				'acao' => '<button type="button" class="btn btn-link btn-sm" onclick="javascript:editar('.$item->id.')"><i class="fas fa-edit"></i></button>&nbsp;<button type="button" class="btn btn-link btn-sm text-danger" onclick="javascript:deletar('.$item->id.')"><i class="fas fa-trash"></i></button>',
			));
		}

		echo json_encode($json);
	}

	public function visualizar($id) {

		$this->load->model('experiencia_model');
		$json = $this->experiencia_model->getExperiencia($id);

		echo json_encode($json);
	}

	public function salvar() {

		$json['type'] = 'success';
		$json['title'] = 'Dados alterados com sucesso';

		$valor = $this->input->post();

		$this->load->model('experiencia_model');
		$id = $this->experiencia_model->setExperiencia($valor);



		if($id == 0){
			$json['type'] = 'error';
			$json['title'] = 'Dados nao atualizados';
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