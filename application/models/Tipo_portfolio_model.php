<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tipo_portfolio_model extends CI_Model {

	private $tabela = 'tipo_portfolio';

	function __construct(){
		parent::__construct();
	}

	public function getTipos(){
		$query = $this->db->get($this->tabela);
		return  $query->result();
	}

	public function getTipo($id) {
		$this->db->where('id', $id);
		$query = $this->db->get($this->tabela);
		return  $query->row();
	}

	public function setTipo($dados)	{
		if(isset($dados['id']) && $dados['id'] > 0){
			$this->db->where('id', $dados['id']);
			unset($dados['id']);
			$this->db->update($this->tabela, $dados);
			return $this->db->affected_rows();
		}else{
			$this->db->insert($this->tabela, $dados); 
			return  $this->db->insert_id();
		}
	}

	public function delTipo($id){
		$this->db->where('id', $id);
		$this->db->delete($this->tabela);
		return $this->db->affected_rows();
	}
}

