<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Permisos_model extends CI_Model
{
	
	public function getPermisos(){
		$this->db->select("p.*,m.nombre as menu, r.nomb_rol as roles");
		$this->db->from("permisos p");
		$this->db->join("rol r","p.codi_rol = r.codi_rol");
	 $this->db->join("menus m","p.id_menu = m.id_menu");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getMenus(){
		$resultados = $this->db->get("menus");
		return $resultados->result();
	}

	public function save($data)
	{	
		return $this->db->insert('permisos',$data);
	}

	public function getPermiso($id)
	{
		$this->db->where("id_permiso",$id);
		$resultado = $this->db->get("permisos");
		return $resultado->row();

	}
	
	public function update($id,$data)
	{
		$this->db->where("id_permiso",$id);
		return $this->db->update("permisos",$data);
	}

	public function delete($id){
		$this->db->where("id_permiso",$id);
		$this->db->delete("permisos");
	}
}