<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {
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
			'title' => 'Portfolio',
			'menu' => 'portfolio',
			'stylesheets' => array(
				'template/dashboard.css',
			),
			'scripts' => array(
				'util.js',
				'portfolio.js'
			),
			'modals' => array(
				'modal_portfolio'
			)
		);

		$this->template->showDashboard('portfolio', $data);
	}

	public function listar(){
		$this->load->model('portfolio_model');
		$json['data'] = array();

		$resultado = $this->portfolio_model->getPortfolios();

		foreach ($resultado as $item) {
			$imagem = base_url().'assets/img/upload/default.png';
			if(!is_null($item->foto_1) && !empty($item->foto_1)){
				$imagem = base_url().'upload/'.$item->foto_1;
			}
			array_push($json['data'], array(
				'id' => $item->id,
				'imagem' => '<img id="img" src="'.$imagem.'" style="max-height: 50px;">',
				'nome' => $item->nome,
				'tipo' => $item->tipo,
				'status' => $item->status,
				'mostrar_curriculo' => ($item->mostrar_curriculo == 0) ? 'NÃO' : 'SIM',
				'acao' => '<button type="button" class="btn btn-link btn-sm" onclick="javascript:editar('.$item->id.')"><i class="fas fa-edit"></i></button>&nbsp;<button type="button" class="btn btn-link btn-sm text-danger" onclick="javascript:deletar('.$item->id.')"><i class="fas fa-trash"></i></button>',
			));
		}

		echo json_encode($json);
	}

	public function visualizar($id) {

		$this->load->model('portfolio_model');
		$json = $this->portfolio_model->getPortfolio($id);

		echo json_encode($json);
	}

	public function salvar() {
		$aux = 0;
		$aux2 = 0;
		$cont = 0;
		$json['type'] = 'success';
		$json['title'] = 'Dados alterados com sucesso';

		$valor = $this->input->post();
		$foto = $_FILES;

		unset($valor[0]);

		$this->load->model('portfolio_model');
		$resultado = $this->portfolio_model->setPortfolio($valor);

		if(empty($valor['id'])){
			$valor['id'] = $resultado;
		}

		if($valor['id'] > 0){
			foreach ($foto as $item){
				$cont++;

				if($item['size'] > 0){
					$ext = explode('/', $item['type']);

					$config = array(
						'upload_path' => './upload/',
						'allowed_types' => '*',
						'file_name' => 'portfolio'.$valor['id'].$cont.'.'.$ext[1],
						'overwrite' => true
					);

					$this->load->library('upload', $config);

					if(!$this->upload->do_upload('imagem_'.$cont)){
						$aux = 1;
					}else{
						$dados['id'] = $valor['id'];
						$dados['foto_'.$cont] = $config['file_name'];
						$resultado = $this->portfolio_model->setPortfolio($dados);

						if($resultado == 0 && $aux2 == 0){
							$aux2 = 1;
						}
					}
				}
			}
		}else{
			$json['type'] = 'error';
			$json['title'] = 'Não foi possível Cadastrar/Alterar o Portfólio';
		}

		if($aux == 1){
			$json['type'] = 'warning';
			$json['title'] = 'Não foi possível carregar as imagens do Portfólio';
		}elseif($aux2 == 1){
			$json['type'] = 'warning';
			$json['title'] = 'Não foi possível salvar as imagens do Portfólio';
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