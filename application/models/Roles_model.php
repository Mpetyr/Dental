<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
/**
* 
*/
class Roles_model extends CI_Model
{
	
	public function getroles(){
		// $this->db->where("esta_rol","1");
		$resultados = $this->db->get("rol");
		return $resultados->result();
	}

	public function getRoles_Id($id){
		$this->db->from("rol");
		$this->db->where('codi_rol',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function add($data)
	{
		return	$this->db->insert("rol",$data);

	}

	public function rol_update($where,$data)
	{
		$this->db->update("rol",$data,$where);
		return $this->db->affected_rows();
	}
	
	public function update_rol($id,$data)
	{
		$this->db->where("codi_rol",$id);
		return $this->db->update("rol",$data);
	}
}