<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	private $dados;

	public function __construct() {
		parent::__construct();
	}

	public function index()	{
		// $this->dados['stylesheets'] = array(
		// 	''
		// );

		$this->dados['scripts'] = array(
			'util',
			'login'
		);

		$this->load->view('login', $this->dados);
	}

	public function autenticar()
	{
		$json = array();
		$json['status'] = 1;
		$json['error_list'] = array();

		$valor = $this->input->post();

		if (empty($valor['user'])) {
			$json['status'] = 0;
			$json['error_list']['#user'] = "O campo Usuário não pode ser vazio";
		}elseif (empty($valor['password'])) {
			$json['status'] = 0;
			$json['error_list']['#password'] = "O campo Senha não pode ser vazio";
		}else {
			$this->load->model('user_model');
			$dados = $this->user_model->getUser($valor['user']);

			if (!is_null($dados)) {
				if(password_verify($valor['password'], $dados->senha) == 1){
					$array = array();
					
					foreach ($dados as $key => $value) {
						$array[$key] = $value;
					}
					
					$this->session->set_userdata('Dados', $array);
				} else {
					$json['status'] = 0;
				}
			}else {
				$json['status'] = 0;
			}
			if ($json['status'] == 0) {
				$json['error_list']['#user, #password'] = "Dados incorretos";
			}
		}

		echo json_encode($json);
	}

	public function encerrar()
	{
		$this->session->sess_destroy('Dados');
		//Carregamento da página de LOGIN
			redirect('home','refresh');
	}

	private function gerasenha(){
		echo password_hash('@paulo', PASSWORD_DEFAULT);
	}
}
