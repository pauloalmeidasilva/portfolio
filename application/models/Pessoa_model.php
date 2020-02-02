<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa_model extends CI_Model {

	private $tabela = 'pessoa';

	function __construct(){
		parent::__construct();

	}

	public function login($login){
		$this->db->where('login', $login);
		$query = $this->db->get($this->tabela);

		if($query->num_rows() > 0){
			return  $query->row();
		}else{
			return null;
		}
	}

	public function getPessoa($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('pessoa');
		return  $query->row();
	}

	public function setPessoa($dados){
		if(isset($dados['id']) && $dados['id'] > 0){
			$this->db->where('id', $dados['id']);
			unset($dados['id']);
			$this->db->update('pessoa', $dados);
		}else{
			$this->db->insert('pessoa', $dados); 
		}
		return  $this->db->affected_rows();
	}
}

