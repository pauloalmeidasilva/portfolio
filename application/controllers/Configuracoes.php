<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracoes extends CI_Controller {
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
			'title' => 'Configurações',
			'menu' => 'configuracoes',
			'stylesheets' => array(
				'template/dashboard.css',
			),
			'scripts' => array(
				'util.js',
				'conf-tipo.js',
				'conf-status.js'
			),
			'modals' => array()
		);

		$this->template->showDashboard('configuracoes', $data);
	}

	/*===================================================
	=            Categoria Tipos de Projetos            =
	===================================================*/
	public function listarTipo(){
		$this->load->model('tipo_portfolio_model');
		$json['data'] = array();

		$resultado = $this->tipo_portfolio_model->getTipos();

		foreach ($resultado as $item) {
			array_push($json['data'], array(
				'id' => $item->id,
				'descricao' => $item->descricao,
				'status' => ($item->status == 0) ? 'INATIVO' : 'ATIVO',
				'acao' => '<button type="button" class="btn btn-link btn-sm" onclick="javascript:editar('.$item->id.')"><i class="fas fa-edit"></i></button>&nbsp;<button type="button" class="btn btn-link btn-sm text-danger" onclick="javascript:deletar('.$item->id.')"><i class="fas fa-trash"></i></button>',
			));
		}

		echo json_encode($json);
	}

	public function visualizarTipo($id) {

		$this->load->model('tipo_portfolio_model');
		$json = $this->tipo_portfolio_model->getTipo($id);

		echo json_encode($json);
	}

	public function salvarTipo() {
		$json['type'] = 'success';
		$json['title'] = 'Dados alterados com sucesso';

		$valor = $this->input->post();

		$this->load->model('tipo_portfolio_model');
		$resultado = $this->tipo_portfolio_model->setTipo($valor);

		if($resultado == 0){
			$json['type'] = 'error';
			$json['title'] = 'Dados nao atualizados';
		}

		echo json_encode($json);
	}

	public function deletarTipo($id){
		$json['type'] = 'success';
		$json['title'] = 'Tipo deletado com sucesso';

		// Verificar se tem algum projeto associado com este tipo
		$this->load->model('portfolio_model');
		$result = $this->portfolio_model->tipoVinculado($id);

		if($result == 0){
			$this->load->model('tipo_portfolio_model');
			$result = $this->tipo_portfolio_model->delTipo($id);

			if($result == 0){
				$json['type'] = 'error';
				$json['title'] = 'Tipo não deletado';
			}
		}else{
			$json['type'] = 'error';
			$json['title'] = 'Este tipo está vinculado a um projeto, desvincule-o primeiro';
		}

		echo json_encode($json);
	}
	/*=====  End of Categoria Tipos de Projetos  ======*/

	/*====================================================
	=            Categoria Status de Projetos            =
	====================================================*/
	public function listarStatus(){
		$this->load->model('status_portfolio_model');
		$json['data'] = array();

		$resultado = $this->status_portfolio_model->getStatus();

		foreach ($resultado as $item) {
			array_push($json['data'], array(
				'id' => $item->id,
				'descricao' => $item->descricao,
				'cor' => '<div style="background: '.$item->cor.'">&nbsp</div>',
				'status' => ($item->status == 0) ? 'INATIVO' : 'ATIVO',
				'acao' => '<button type="button" class="btn btn-link btn-sm" onclick="javascript:editar('.$item->id.')"><i class="fas fa-edit"></i></button>&nbsp;<button type="button" class="btn btn-link btn-sm text-danger" onclick="javascript:deletar('.$item->id.')"><i class="fas fa-trash"></i></button>',
			));
		}

		echo json_encode($json);
	}

	public function visualizarStatus($id) {

		$this->load->model('status_portfolio_model');
		$json = $this->status_portfolio_model->getStatusById($id);

		echo json_encode($json);
	}

	public function salvarStatus() {
		$json['type'] = 'success';
		$json['title'] = 'Dados alterados com sucesso';

		$valor = $this->input->post();

		$this->load->model('status_portfolio_model');
		$resultado = $this->status_portfolio_model->setStatus($valor);

		if($resultado == 0){
			$json['type'] = 'error';
			$json['title'] = 'Dados nao atualizados';
		}

		echo json_encode($json);
	}

	public function deletarStatus($id){
		$json['type'] = 'success';
		$json['title'] = 'Status deletado com sucesso';

		// Verificar se tem algum projeto associado com este tipo
		$this->load->model('portfolio_model');
		$result = $this->portfolio_model->statusVinculado($id);

		if($result == 0){
			$this->load->model('status_portfolio_model');
			$result = $this->status_portfolio_model->delStatus($id);

			if($result == 0){
				$json['type'] = 'error';
				$json['title'] = 'Status não deletado';
			}
		}else{
			$json['type'] = 'error';
			$json['title'] = 'Este status está vinculado a um projeto, desvincule-o primeiro';
		}

		echo json_encode($json);
	}
	/*=====  End of Categoria Status de Projetos  ======*/
	
}
?>