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

	function getHistoriaImprimir($id)
	{
		$paciente = $this->db->from('paciente')
		->select('paciente.*,CONCAT(apel_pac," ", nomb_pac) as paciente, dni_pac as dni, sexo_pac as sexo,telf_pac as telefono, dire_pac as direccion,civi_pac as estadocivil,edad_pac as edad,emai_pac as email,paises.nombre as pais, lugar_nacimiento as lugarnacimiento, fena_pac as fechanacimiento, estudios_pac as estudios,ocupacion as ocupacion,civi_pac as civil,informacion_clinica as entero, departamento.departamento_nombre as departamento,
			provincia.provincia_nombre as provincia,
			distrito.distrito_nombre as distrito,
		    paciente_enfermedadactual.motivo_enfact as motivo,
		    paciente_enfermedadactual.tiempo_enfact as enfermedad,
		    paciente_enfermedadactual.medicam_enfact as medicamento,
		    paciente_enfermedadactual.nommedicam_enfact as nombmedi,
		    paciente_enfermedadactual.antecper_enfact as antecpersonales,
		    paciente_enfermedadactual.antecfam_enfact as antecfamiliares,
		    paciente_consulta.ortod_paccon as consulortodoncia,
		    paciente_consulta.ortodtexto_paccon as respuesta1,
		    paciente_consulta.medic_paccon as consutmedicamento,
		    paciente_consulta.medictexto_paccon as respuesta2,
		    paciente_consulta.alergico_paccon as consulalergico,
		    paciente_consulta.alergicotexto_paccon	as respuesta3,
		    paciente_consulta.hosp_paccon as consulhospi,
		    paciente_consulta.hosptexto_paccon as respuesta4,
		    paciente_consulta.trans_paccon as consultranstorno,
		    paciente_consulta.transtexto_paccon as respuesta5,
		    paciente_consulta.padece_paccon as padece,
		    paciente_consulta.cepilla_paccon as consulcepilla,
		    paciente_consulta.cepillatexto_paccon as respuesta6,
		    paciente_consulta.presion_paccon as consulpresion,
		    paciente_consulta.presiontexto_paccon as respuesta7'
		    )
		->join('paises','paciente.pais_id=paises.id')
		->join('departamento','paciente.departamento_id=departamento.departamento_id')
		->join('provincia','paciente.provincia_id=provincia.provincia_id')
		->join('distrito','paciente.distrito_id=distrito.distrito_id')
		->join('paciente_enfermedadactual','paciente_enfermedadactual.codi_pac=paciente.codi_pac')
		->join('paciente_consulta','paciente_consulta.codi_pac=paciente.codi_pac')
		->where('paciente.codi_pac',$id)
		->get()->row();

		$paciente->alergias = $this->db->from('paciente_alergia')
		->join('alergia','paciente_alergia.cod_ale = alergia.cod_ale')
		->where('codi_pac',$id)
		->get()->result();

		return $paciente;
	}




	function getEvolucion($data)
	{
		$this->db->from('paciente_evolucion');
		$this->db->join('medico','paciente_evolucion.codi_med = medico.codi_med');
		$this->db->join('especialidad','paciente_evolucion.cod_especialidad=especialidad.cod_especialidad');
		$this->db->where('codi_pac',$data['paciente']);
		$this->db->where('pacevol_estado',1);
		$queryLike = $this->db->get();

		$this->db->from('paciente_evolucion');
		$this->db->select('paciente_evolucion.*, fecha_evolucion,pacevol_descripcion,CONCAT(nomb_med," ",apel_med) as medico, nombre_especialidad');
		$this->db->join('medico','paciente_evolucion.codi_med = medico.codi_med');
		$this->db->join('especialidad','paciente_evolucion.cod_especialidad=especialidad.cod_especialidad');
		$this->db->where('codi_pac',$data['paciente']);
		$this->db->where('pacevol_estado',1);
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
			<button data-id="'.$q->pacevol_id.'" class="editar-evolucion btn btn-warning btn-xs" data-toggle="modal" data-target="#ModalEditarEvolucion">Editar</button>';


			$boton .= '<a></a> <button data-id="'.$q->pacevol_id.'" class="anular-evolucion btn btn-danger btn-xs">Anular</button>';
			$row[] = [$q->fecha_evolucion,$q->pacevol_descripcion,$q->medico,$q->nombre_especialidad,$boton];
		}
		$result['aaData'] = $row;
		return $result;
	}


	function getListadoCitas($data)
	{
		$this->db->from('cita_medica');
		//$this->db->join('paciente','cita_medica.codi_pac=paciente.codi_pac');
		$this->db->join('especialidad','cita_medica.cod_especialidad=especialidad.cod_especialidad');
		$this->db->join('medico','cita_medica.codi_med=medico.codi_med');
		$this->db->join('tipo_citado','cita_medica.cod_citado=tipo_citado.cod_citado');
		$this->db->where('codi_pac',$data['paciente']);
		$queryLike = $this->db->get();

		$this->db->from('cita_medica');
		$this->db->select('cita_medica.*,codi_cit,fech_cit,nombre_especialidad,concat(nomb_med," ",apel_med) as medico,nomb_citado');
		//$this->db->join('paciente','cita_medica.codi_pac=paciente.codi_pac');
		$this->db->join('especialidad','cita_medica.cod_especialidad=especialidad.cod_especialidad');
		$this->db->join('medico','cita_medica.codi_med=medico.codi_med');
		$this->db->join('tipo_citado','cita_medica.cod_citado=tipo_citado.cod_citado');
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


			$botones = '<div class="btn-footer text-center">
                                          
                                                   <a href="'.base_url('mantenimiento/medico/editar/'.$q->codi_cit).'" class="btn btn-primary" style="padding:2px 5px;margin:0px 2px"> <i class="fa fa-edit"></i> </a>';

			$row[] = [$q->codi_cit,$q->fech_cit,$q->nombre_especialidad,$q->medico,$q->nomb_citado,$estado,$botones];
		}
		$result['aaData'] = $row;
		return $result;
	}

}

/* End of file Historia_model.php */
/* Location: ./application/models/Historia_model.php */