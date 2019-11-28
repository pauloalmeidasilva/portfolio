<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	private function atualizaBanco(){
		$this->load->library('migration');

		if ($this->migration->current() === FALSE){
			show_error($this->migration->error_string());
		}
	}

	public function index() {
		$dados = array(
			'title' => 'Painel',
			'stylesheets' => array(
				'template/dashboard.css'),
			'scripts' => array(
				'util.js',
				'dashboard.js'
			)
		);
		
		$this->template->showDashboard('painel', $dados);


	}
}