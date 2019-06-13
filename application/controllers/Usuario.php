<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
				'user.js'
			)
		);

		$this->template->show('usuario', $data);
	}

	public function atualizar()	{
		$json = array();
		$json['status'] = 1;
		$json['error_list'] = array();

		$valor=$this->input->post();

		//print_r($valor);


		if (empty($valor['nome'])) {
			$json['status'] = 0;
			$json['error_list']['#nome'] = "Preencha o campo Nome";
		}elseif (empty($valor['nascimento'])) {
			$json['status'] = 0;
			$json['error_list']['#nascimento'] = "Preencha o campo Data de Nascimento";
		}elseif (empty($valor['telefone'])) {
			$json['status'] = 0;
			$json['error_list']['#telefone'] = "Preencha o campo Mãe";
		}elseif (empty($valor['email'])) {
			$json['status'] = 0;
			$json['error_list']['#email'] = "Preencha o campo Certidão de Nascimento";
		}elseif (empty($valor['interesse'])) {
			$json['status'] = 0;
			$json['error_list']['#interesse'] = "Preencha o campo RG";
		}elseif (empty($valor['notas_interesse'])) {
			$json['status'] = 0;
			$json['error_list']['#notas_interesse'] = "Preencha o campo CPF";
		}elseif (empty($valor['profissao'])) {
			$json['status'] = 0;
			$json['error_list']['#profissao'] = "Preencha o campo Logradouro";
		}elseif (empty($valor['perfil'])) {
			$json['status'] = 0;
			$json['error_list']['#perfil'] = "Preencha o campo Número. Caso sua residência não tiver número colocar S/N";
		// }elseif (empty($valor['fundo_site'])) {
		// 	$json['status'] = 0;
		// 	$json['error_list']['#fundo_site'] = "Preencha o campo Bairro";
		}elseif (empty($valor['facebook'])) {
			$json['status'] = 0;
			$json['error_list']['#facebook'] = "Preencha o campo Cidade";
		}elseif (empty($valor['linkedin'])) {
			$json['status'] = 0;
			$json['error_list']['#linkedin'] = "Preencha o campo CEP";
		}elseif (empty($valor['instagram'])) {
			$json['status'] = 0;
			$json['error_list']['#instagram'] = "Preencha o campo Telefone";
		}else {
			$this->load->model('pessoa_model');
			$id = $this->pessoa_model->setPessoa($valor);
			$dados = $this->pessoa_model->getPessoa($valor['id']);

			$array = array();

			foreach ($dados as $key => $value) {
				$array[$key] = $value;
			}

			$this->session->set_userdata('Dados', $array);

			//print_r($id);

			if($id == 0){
				$json['status'] = 0;
			}
			if ($json['status'] == 0) {
				$json['error_list']['#aviso'] = "Dados nao atualizados.";
			}
		}

		echo json_encode($json);
	}

}
?>