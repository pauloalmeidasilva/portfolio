<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct(){
		parent::__construct();

	}

	public function getUser($login)
	{
		$this->db->select('*');
		$this->db->join( 'pessoa' ,  'pessoa.id = usuario.pessoa_id', 'left');

		if (!is_null($login)) {
			$this->db->where('usuario.login', $login);
		}
		$query = $this->db->get('usuario');
		if($query->num_rows() > 1){
			return  $query->result();
		}else{
			return  $query->row();
		}
	}

	public function selectFuncionario($id)
	{
		$this->db->where('fun_codigo', $id);
		$query = $this->db->get('funcionarios', 1); 
		if($query->num_rows() == 1){
			return  $query->row();
		}
		else{
			return NULL;
		}
	}

	public function setUser($dados)
	{
		if(isset($dados['id']) && $dados['id'] > 0){
			$this->db->where('id', $dados['id']);
			unset($dados['id']);
			$this->db->update('usuario', $dados);
			return $this->db->affected_rows();
		}else{
			$this->db->insert('usuario', $dados); 
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

