<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa_model extends CI_Model {

	function __construct(){
		parent::__construct();

	}

	public function getPessoa($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('pessoa');
		return  $query->row();
	}

	// public function selectFuncionario($id)
	// {
	// 	$this->db->where('fun_codigo', $id);
	// 	$query = $this->db->get('funcionarios', 1); 
	// 	if($query->num_rows() == 1){
	// 		return  $query->row();
	// 	}
	// 	else{
	// 		return NULL;
	// 	}
	// }

	public function setPessoa($dados)
	{
		if(isset($dados['id']) && $dados['id'] > 0){
			$this->db->where('id', $dados['id']);
			unset($dados['id']);
			$this->db->update('pessoa', $dados);
			return $this->db->affected_rows();
		}else{
			$this->db->insert('pessoa', $dados); 
			return  $this->db->insert_id();
		}
	}

	public function delFuncionario($id)
	{
		$this->db->where('fun_codigo', $id);
		$this->db->delete('funcionarios');
		return $this->db->affected_rows();
	}
}

