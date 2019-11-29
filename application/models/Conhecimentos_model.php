<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conhecimentos_model extends CI_Model {

	private $tabela = 'conhecimentos';

	function __construct(){
		parent::__construct();

	}

	public function getConhecimentos($filtro){
		$this->db->where('id_pessoa', $this->session->userdata('Dados')['id_pessoa']);
		$this->db->like('nome_linguagem', $filtro, 'BOTH');
		$this->db->order_by('tempo_experiencia', 'desc');
		$query = $this->db->get($this->tabela);
		return  $query->result();
	}

	public function getConhecimento($id) {
		$this->db->where('id', $id);
		$query = $this->db->get($this->tabela);
		return  $query->row();
	}

	public function setConhecimento($dados)
	{
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

	public function delConhecimento($id){
		$this->db->where('id', $id);
		$this->db->delete($this->tabela);
		return $this->db->affected_rows();
	}
}

