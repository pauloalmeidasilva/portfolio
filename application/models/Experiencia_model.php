<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Experiencia_model extends CI_Model {

	private $tabela = 'trabalhos';

	function __construct(){
		parent::__construct();

	}

	public function getExperiencias($campo = null, $filtro = null, $pessoa_id = null) {
		if ($pessoa_id != null) {
			$this->db->where('pessoa_id', $pessoa_id);
		}

		if ($campo != null) {
			$this->db->like($campo, $filtro, 'BOTH');
		}
		
		$this->db->order_by('ano_inicio', 'desc');
		$query = $this->db->get($this->tabela);
		return  $query->result();
	}

	public function getExperiencia($id) {
		$this->db->where('id', $id);
		$query = $this->db->get($this->tabela);
		return  $query->row();
	}

	public function setExperiencia($dados)
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

	public function delExperiencia($id){
		$this->db->where('id', $id);
		$this->db->delete($this->tabela);
		return $this->db->affected_rows();
	}
}

