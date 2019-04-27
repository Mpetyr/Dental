<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historia_model extends CI_Model {

	function getHistoria($data)
	{
		$this->db->from('paciente');
		$this->db->where('DATE(fecha_registro) >=',$data['desde']);
		$this->db->where('DATE(fecha_registro) <=',$data['hasta']);
		$queryLike = $this->db->get();

		$this->db->from('paciente');
		$this->db->select('codi_pac,CONCAT(nomb_pac," ",apel_pac) AS NombresApellidos,edad_pac,dni_pac, DATE(fecha_registro) as fecha_registro,esta_pac');
		$this->db->where('DATE(fecha_registro) >=',$data['desde']);
		$this->db->where('DATE(fecha_registro) <=',$data['hasta']);
		if (isset($data['nombresApellidos'])) {
			$this->db->having("NombresApellidos LIKE '%".$data['nombresApellidos']."%'");
		}
		$query = $this->db->get();

		$result = array();
		$result['sEcho'] = $data['sEcho'];
		$result['iTotalRecords'] = $queryLike->num_rows();
		$result['iTotalDisplayRecords'] = $queryLike->num_rows();
		
		$row = [];
		foreach ($query->result() as $q) {
			if ($q->esta_pac=='S') {
				$estado = '<label class="label label-success">Activo</label>';
			}elseif($q->esta_pac=='N'){
				$estado = '<label class="label label-info" style="text-align: center;">Inactivo</label>';
			}	

			$opciones = '<div class="btn-footer text-center">

			<a href="'.base_url('historia/movimiento/historia/'.$q->codi_pac).'" class="btn btn-info btn-xs" style="text-align:center"><i class="fa fa-edit"></i></a>';
	    
			$row[] = [$q->codi_pac,$q->NombresApellidos,$q->edad_pac,$q->dni_pac,$q->fecha_registro,'',$estado,$opciones];
		}
		$result['aaData'] = $row;
		return $result;
	}

	function getAlergias($data)
	{
		$this->db->from('paciente_alergia');
		$this->db->join('alergia','paciente_alergia.cod_ale = alergia.cod_ale');
		$this->db->where('codi_pac',$data['paciente']);
		$queryLike = $this->db->get();

		$this->db->from('paciente_alergia');
		$this->db->join('alergia','paciente_alergia.cod_ale = alergia.cod_ale');
		$this->db->where('codi_pac',$data['paciente']);
		if ($data['length']!=-1) {
			$this->db->limit($data['length'],$data['start']);
		}
		if (isset($data['orderCampo'])) {
			$this->db->order_by($data['orderCampo'],$data['orderDireccion']);
		}
		$query = $this->db->get();

		$result = array();
		$result['sEcho'] = $data['sEcho'];
		$result['iTotalRecords'] = $queryLike->num_rows();
		$result['iTotalDisplayRecords'] = $queryLike->num_rows();
		
		$row = [];
		foreach ($query->result() as $q) {
			$boton = '<button data-id="'.$q->pacale_id.'" class="anular-alergia btn btn-danger btn-xs">Anular</button>';
			$row[] = [$q->pacale_id,$q->nombre_ale,$q->pacale_observacion,$boton];
		}
		$result['aaData'] = $row;
		return $result;
	}

}

/* End of file Historia_model.php */
/* Location: ./application/models/Historia_model.php */