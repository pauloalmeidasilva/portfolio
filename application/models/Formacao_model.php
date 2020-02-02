<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formacao_model extends CI_Model {

	private $tabela = 'formacoes';

	function __construct(){
		parent::__construct();
	}

	public function getFormacoes(){
		$this->db->where('id_pessoa', $this->session->userdata('Dados')['id']);
		$this->db->order_by('inicio', 'desc');
		$query = $this->db->get($this->tabela);
		return  $query->result();
	}

	public function getFormacao($id) {
		$this->db->where('id', $id);
		$query = $this->db->get($this->tabela);
		return  $query->row();
	}

	public function setFormacao($dados){
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

	public function delFormacao($id){
		$this->db->where('id', $id);
		$this->db->delete($this->tabela);
		return $this->db->affected_rows();
	}
}

