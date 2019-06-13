<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		if(!$this->session->userdata('Dados')){
		 	redirect('home','refresh');
		}
	}

	public function index()	{
		$this->dados['stylesheets'] = array(
			'dashboard.css'
		);

		$this->dados['scripts'] = array(
			'util.js',
			'dashboard.js'
		);;
		
		$this->template->show('dashboard', $this->dados);
	}

}
?>