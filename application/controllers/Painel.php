<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {
	/**
	 * Controller Painel
	 * 
	 * Descrição:
	 * 		Controller responsável pelo obtenção e manipulação de dados solicitados na tela do painel principal do sistema.
	 * 
	 * Métodos Implementados:
	 * 		__construtor;
	 * 		atualizaBanco;
	 * 		index;
	 * 
	 * Orientação para implementação do controller:
	 * 		=> Informar os atributos utilizados no controller;
	 * 		=> Método Construtor;
	 * 		=> Métodos privados;
	 * 		=> Métodos públicos referente à página;
	 */

	public function __construct(){
		parent::__construct();
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
		$dados = array(
			'title' => 'Painel',
			'menu' => 'principal',
			'stylesheets' => array(
				'template/dashboard.css'),
			'scripts' => array(
				'util.js',
				'dashboard.js'
			),
			'modals' => array()
		);
		
		$this->template->showDashboard('painel', $dados);
	}
}