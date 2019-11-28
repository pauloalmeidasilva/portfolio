<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public function login($dados){
		$this->db->select('*');
		$this->db->join( 'pessoa' ,  'pessoa.id = usuario.id_pessoa', 'left');

		$this->db->where('usuario.login = "'.$dados['login'].'";');
		$query = $this->db->get('usuario');

		if($query->num_rows() > 0){
			return  $query->row();
		}else{
			return null;
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

