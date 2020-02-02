<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()	{
		$dados = array(
			'title' => 'Login',
			'stylesheets' => array(),
			'scripts' => array(
				'util.js',
				'login.js'
			)
		);
		
		$this->template->showLogin('login', $dados);
	}

	public function autenticar(){
		$json['type'] = 'success';

		$valor = $_GET;

		if(empty($valor['login'])){
			$json['type'] = 'warning';
			$json['title'] = 'O campo "Usuário" não pode ser vazio';
			$json['error'] = '#usuario';
		}elseif(empty($valor['senha'])){
			$json['type'] = 'warning';
			$json['title'] = 'O campo "Senha" não pode ser vazio';
			$json['error'] = '#senha';
		}else{
			$this->load->model('pessoa_model');
			$resultado = $this->pessoa_model->login($valor['login']);

			if(!is_null($resultado)){
				if(password_verify($valor['senha'], $resultado->senha)){
					$array = json_decode(json_encode($resultado), TRUE);
					
					$this->session->set_userdata('Dados',$array);
				}else{
					$json['type'] = 'error';
				}
			}else{
				$json['type'] = 'error';
			}
		}

		if($json['type'] == 'error'){
			$json['title'] = 'Dados incorretos';
			$json['error'] = '#usuario,#senha';
		}

		echo json_encode($json);
	}

	public function sair(){
		$this->session->sess_destroy();
		redirect('home','refresh');
	}
}
