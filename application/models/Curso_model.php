<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso_model extends CI_Model {

	private $tabela = 'cursos';

	function __construct(){
		parent::__construct();
	}

	public function getCursos(){
		$this->db->where('id_pessoa', $this->session->userdata('Dados')['id']);
		$this->db->order_by('nome', 'asc');
		$query = $this->db->get($this->tabela);
		return  $query->result();
	}

	public function getCurso($id) {
		$this->db->where('id', $id);
		$query = $this->db->get($this->tabela);
		return  $query->row();
	}

	public function setCurso($dados){
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

	public function delCurso($id){
		$this->db->where('id', $id);
		$this->db->delete($this->tabela);
		return $this->db->affected_rows();
	}
}

