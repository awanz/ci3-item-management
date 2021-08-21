<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MerekModel extends CI_Model {

	private $table = "merek";

	function getAll(){
		$this->db->order_by("idMerek", "DESC");
		return $this->db->get($this->table);
	}

	function getBy($where){		
		return $this->db->get_where($this->table,$where);
	}

    function insert($data){
		$result = $this->db->insert($this->table, $data);
		return $result;
    }

	function update($where, $data){
		$this->db->where($where);
		$result = $this->db->update($this->table, $data);
		return $result;
	}

	function delete($where){
		$this->db->where($where);
		$result = $this->db->delete($this->table);
		return $result;
	}

}