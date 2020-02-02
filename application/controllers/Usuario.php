<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('Dados')){
			redirect('home','refresh');
		}
	}

	private function atualizaBanco(){
		/**
		 * Método responsável pala atualização da versão do banco de dados pelo migrations.
		 */
		$this->load->library('migration');

		if ($this->migration->current() === FALSE){
			show_error($this->migration->error_string());
		}
	}

	public function index(){
		$this->atualizaBanco();
		$data = array(
			'title' => 'Perfil do Usuário',
			'menu' => 'usuario',
			'stylesheets' => array(
				'template/dashboard.css'
			),
			'scripts' => array(
				'util.js',
				'user.js'
			),
			'modals' => array(
				'modal_senha'
			)
		);

		$this->template->showDashboard('usuario', $data);
	}

	public function atualizar()	{
		$aux = 0;
		$json['type'] = 'success';
		$json['title'] = 'Dados alterados com sucesso';

		$valor=$this->input->post();
		$foto = $_FILES['imagem'];

		if($foto['size'] > 0){
			$aux = 1;

			$ext = explode('/', $foto['type']);

			$config = array(
				'upload_path' => './upload/',
				'allowed_types' => '*',
				'file_name' => 'perfil'.$valor['id'].'.'.$ext[1],
				'overwrite' => true
			);

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('imagem')){
				$json['type'] = 'warning';
				$json['title'] = 'Não foi possível carregar a imagem';
			}
		}

		if($json['type'] == 'success'){

			if(isset($config['file_name'])){
				$valor['foto'] = $config['file_name'];
			}

			$this->load->model('pessoa_model');
			$id = $this->pessoa_model->setPessoa($valor);
			$dados = $this->pessoa_model->getPessoa($valor['id']);

			$array = array();

			foreach ($dados as $key => $value) {
				$array[$key] = $value;
			}

			$this->session->set_userdata('Dados', $array);

			//print_r($id);

			if($id == 0 && $aux == 0){
				$json['type'] = 'error';
			}

			if ($json['type'] == 'error') {
				$json['title'] = "Dados nao atualizados";
			}
		}

		echo json_encode($json);
	}

	public function troca_senha(){
		$json['type'] = 'success';
		$json['title'] = 'Dados alterados com sucesso';

		$valor=$this->input->post();

		//print_r($this->session->userdata('Dados'));

		if(password_verify($valor['senha_atual'], $this->session->userdata('Dados')['senha'])){
			$dados['id'] = $this->session->userdata('Dados')['id'];
			$dados['senha'] = password_hash($valor['senha_nova'], PASSWORD_DEFAULT);
			$this->load->model('pessoa_model');
			$resultado = $this->pessoa_model->setPessoa($dados);

			if($resultado == 0){
				$json['type'] = 'error';
				$json['title'] = 'Dados nao atualizados';
			}else{
				$dados = $this->pessoa_model->getPessoa($this->session->userdata('Dados')['id']);

				$array = array();

				foreach ($dados as $key => $value) {
					$array[$key] = $value;
				}

				$this->session->set_userdata('Dados', $array);
			}
		}else{
			$json['type'] = 'warning';
			$json['title'] = 'Dados não conferem, tente novamente';
		}

		echo json_encode($json);
	}

}
?>