<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_model extends CI_Model
{
	
	public function getUser(){
		$this->db->select("u.*, r.nomb_rol as rol");
		$this->db->from("usuario u");
	 $this->db->join("rol r","u.codi_rol=r.codi_rol");
		
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getuser_id($id){
		$this->db->from("usuario");
		$this->db->where('codi_usu',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function agregarusuario($data)
	{	
		
		$this->db->insert("usuario",$data);
		return $this->db->insert_id();
	}

	function deleteuser(){
		$id = $this->input->get('codi_usu');
		$this->db->where('codi_usu',$id);
		$this->db->update('usuario');
		if($this->db->affected_rows()>0){
			return true;
		}else
		{
			return false;
		}
	}
	public function user_update($where,$data)
	{
		$this->db->update("usuario",$data,$where);
		return $this->db->affected_rows();
	}
	
	public function update_user($id,$data)
	{
		$this->db->where("codi_usu",$id);
		 $this->db->update("usuario",$data);
	}

	function verificaLogin($email,$password)
	{
		$query = $this->db->from('usuario')
		->where('email',$email)
		->where('pass_usu',$password)
		->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}
}