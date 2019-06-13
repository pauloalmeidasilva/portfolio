<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()	{

		$this->load->model('pessoa_model');
		$this->load->model('conhecimentos_model');
		$this->load->model('formacao_model');
		$dados['pessoa'] = $this->pessoa_model->getPessoa('1');
		$dados['conhecimentos'] = $this->conhecimentos_model->getConhecimentos('','1');
		$dados['formacoes'] = $this->formacao_model->getFormacoes(null, null,'1');
		
		$this->load->view('home', $dados);
	}
}
