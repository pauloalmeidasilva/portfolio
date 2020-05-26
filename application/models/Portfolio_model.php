<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio_model extends CI_Model {

	private $tabela = 'portfolio';

	function __construct(){
		parent::__construct();
	}

	public function getPortfolios(){
		$this->db->where('id_pessoa', $this->session->userdata('Dados')['id']);
		$this->db->order_by('nome', 'desc');
		$query = $this->db->get($this->tabela);
		return  $query->result();
	}

	public function getPortfolio($id){
		$this->db->where('id', $id);
		$query = $this->db->get($this->tabela);
		return  $query->row();
	}

	public function setPortfolio($dados)	{
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

	public function tipoVinculado($id){
		$this->db->where('tipo', $id);
		$query = $this->db->get($this->tabela);
		return $query->num_rows();
	}

	public function statusVinculado($id){
		$this->db->where('status', $id);
		$query = $this->db->get($this->tabela);
		return $query->num_rows();
	}
}

