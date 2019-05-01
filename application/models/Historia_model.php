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
		$this->db->where('pacale_estado',1);
		$queryLike = $this->db->get();

		$this->db->from('paciente_alergia');
		$this->db->join('alergia','paciente_alergia.cod_ale = alergia.cod_ale');
		$this->db->where('codi_pac',$data['paciente']);
		$this->db->where('pacale_estado',1);
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
			$boton = '<div class="btn-footer text-center">
			<button data-id="'.$q->pacale_id.'" class="editar-alergia btn btn-warning btn-xs" data-toggle="modal" data-target="#ModalEditarAlergia">Editar</button>';


			$boton .= '<a></a> <button data-id="'.$q->pacale_id.'" class="anular-alergia btn btn-danger btn-xs">Anular</button>';
			$row[] = [$q->pacale_id,$q->nombre_ale,$q->pacale_observacion,$boton];
		}
		$result['aaData'] = $row;
		return $result;
	}

	function getRecetas($data)
	{
		$this->db->from('paciente_receta');
		$this->db->join('medico','paciente_receta.codi_med = medico.codi_med');
		$this->db->where('codi_pac',$data['paciente']);
		$this->db->where('pacrec_estado',1);
		$queryLike = $this->db->get();

		$this->db->from('paciente_receta');
		$this->db->select('pacrec_id,pacrec_fecha,pacrec_hora,pacrec_asunto,nomb_med,apel_med,a.desc_enf as diagnostico01,b.desc_enf as diagnostico02, c.desc_enf as diagnostico03');
		$this->db->join('medico','paciente_receta.codi_med = medico.codi_med');
		$this->db->join('enfermedad as a','paciente_receta.codi_enf01 = a.codi_enf','left');
		$this->db->join('enfermedad as b','paciente_receta.codi_enf02 = b.codi_enf','left');
		$this->db->join('enfermedad as c','paciente_receta.codi_enf03 = c.codi_enf','left');
		$this->db->where('codi_pac',$data['paciente']);
		$this->db->where('pacrec_estado',1);
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
			$boton = '<div class="btn-footer text-center">
			<button data-id="'.$q->pacrec_id.'" class="editar-receta btn btn-warning btn-xs" data-toggle="modal" data-target="#ModalEditarReceta">Editar</button>';
			$boton .= '<a href="'.base_url('historia/movimiento/imprimirReceta/'.$q->pacrec_id).'" class="btn btn-success btn-xs" target="_blank" >Imprimir</a>';
			$boton .= '<button data-id="'.$q->pacrec_id.'" class="anular-receta btn btn-danger btn-xs">Anular</button>';
			$diagnostico = $q->diagnostico01;
			if ($q->diagnostico02!='') {
				$diagnostico .= ' | '.$q->diagnostico02;
			}
			if ($q->diagnostico03!='') {
				$diagnostico .= ' | '.$q->diagnostico03;
			}
			$row[] = [
				$q->pacrec_fecha.' '.$q->pacrec_hora,
				$q->pacrec_asunto,
				$q->nomb_med.' '.$q->apel_med,
				$diagnostico,
				$boton
			];
		}
		$result['aaData'] = $row;
		return $result;
	}

	function getPlacas($data)
	{
		$this->db->from('paciente_placa');
		$this->db->where('codi_pac',$data['paciente']);
		$this->db->where('pla_estado',1);
		$queryLike = $this->db->get();

		$this->db->from('paciente_placa');
		$this->db->where('codi_pac',$data['paciente']);
		$this->db->where('pla_estado',1);
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
			$boton = '<div class="btn-footer text-center">

			<button data-id="'.$q->pla_id.'" class="anular-placa btn btn-danger btn-xs">Anular</button>';
			$archivo = '
			<a data-fancybox="gallery" href="'.base_url('assets/uploads/placas/'.$q->pla_archivo).'"><i class="fa fa-image"></i> Ver placa</a>';
			$row[] = [
				$q->pla_fecha,
				$q->pla_nombre,
				$q->pla_notas,
				$archivo,
				$boton
			];
		}
		$result['aaData'] = $row;
		return $result;
	}

}

/* End of file Historia_model.php */
/* Location: ./application/models/Historia_model.php */