<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Medico extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata("login")){
			redirect(base_url());
		}
		$this->load->model('medico_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		
			$data['especialidades'] = $this->modelgeneral->getTable('especialidad');
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/medico/listar',$data);
		$this->load->view('layouts/footer');
		
		
	}

	public function jsonmedicos()
	{
		$data['start'] = $this->input->get_post('start', true);
		$data['length'] = $this->input->get_post('length', true);
		$data['sEcho']  = $this->input->get_post('_', true);

		$columns = array('codi_med','NombresApellidos','NombreEspecialidad','dni_med','coleg_med','fecha_registro','esta_med');
		$orderCampo = $this->input->get_post('order', true);
		$orderCampo = $orderCampo[0]['column'];
		$orderCampo = $columns[$orderCampo];
		$orderDireccion = $this->input->get_post('order', true);
		$orderDireccion = $orderDireccion[0]['dir'];
		$data['orderCampo'] = $orderCampo;
		$data['orderDireccion'] = $orderDireccion;
		$desde = $this->input->get_post('desde');
		$hasta = $this->input->get_post('hasta');
		$medico = $this->input->get_post('medico');
		$especialidad = $this->input->get_post('especialidad');

		if ($desde!='' AND $hasta!='') {
			$data['desde'] = $desde;
			$data['hasta'] = $hasta;
		}
		if ($medico!='') {
			$data['medico'] = $medico;
		}

		if ($especialidad!='') {
			$data['especialidad'] = $especialidad;
		}
			
		$datos = $this->medico_model->getmedico($data);
		header('content-type: application/json; charset=utf-8');
		echo json_encode($datos);
	}



	public function nuevo()
	{
		$data['especialidades'] = $this->modelgeneral->getTable('especialidad');
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/medico/registrar',$data);
		$this->load->view('layouts/footer');
	}

	public function validaEmail()
	{
		if ($this->input->is_ajax_request()) {
			$email = $this->input->get('emai_med');
			$verifica = $this->modelgeneral->verificaUnico('medico','emai_med',$email);
			if ($verifica) {
				echo 'true';
			}else{
				echo 'false';
			}
		}
	}

	

	public function guardar()
	{
		$this->form_validation->set_rules("especialidad","especialidad","required");
		$this->form_validation->set_rules("nombre","nombre","required");
		$this->form_validation->set_rules("apellidos","apellidos","required");
		$this->form_validation->set_rules("dni","Dni","trim | required | min_length [5] | max_length [12]");
		$this->form_validation->set_rules("colegiatura","Colegiatura","required");
		$this->form_validation->set_rules("telefono","Telefono","required");
		$this->form_validation->set_rules("direccion","Direccion","required");
		$this->form_validation->set_rules("fechanacimiento","Fecha Nacimiento","required");
		$this->form_validation->set_rules("sexo","Sexo","required");

		$fecharegistro = date("Y-m-d H:i:s");
		$especialidad = $this->input->post('especialidad');
		$nombre = $this->input->post('nombre');
		$apellidos = $this->input->post('apellidos');
		$dni = $this->input->post('dni');
		$ruc = $this->input->post('ruc');
		$colegiatura = $this->input->post('colegiatura');
		$telefono = $this->input->post('telefono');
		$celular = $this->input->post('celular');
		$direccion =  $this->input->post('direccion');
		$email = $this->input->post('email');
		$fechanacimiento = $this->input->post('fechanacimiento');
		$sexo = $this->input->post('sexo');
		//$estado = $this->input->post('estado');

		
		//$this->form_validation->set_rules("estado","Estado","required");

		if($this->form_validation->run()==true){
			$data = array(
				'cod_especialidad' =>$especialidad,
				'nomb_med' =>$nombre,
				'apel_med' =>$apellidos,
				'dni_med' =>$dni,
				'ruc_med' =>$ruc,
				'coleg_med' =>$colegiatura,
				'telf_med' =>$telefono,
				'cel_med'=>$celular,
				'dire_med' =>$direccion,
				'emai_med' =>$email,
				'fena_med' =>$fechanacimiento,
				'sexo_med' =>$sexo,
				'fecha_registro' =>$fecharegistro,
				'esta_med' => S
			);
			if($this->medico_model->guardarmedico($data)){
				$this->session->set_flashdata('success', 'Te has registrado correctamente en nuestro sistema.<br>Hemos enviado un código de verificación a ');
			redirect(base_url().'mantenimiento/medico');
		}
		else
		{
		$this->session->set_flashdata('error','No se pudo guardar la informacion.<br>Ingresar los datos correctamente');
				redirect(base_url().'mantenimiento/medico/nuevo');
		}

		}

		else{
			$this->nuevo();
		}


	}

	public function editar($id)
	{
		$data['medicos'] = $this->medico_model->getmedico_id($id);
		$data['especialidades'] = $this->modelgeneral->getTable('especialidad');	
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/medico/editar',$data);
		$this->load->view('layouts/footer');
	}

	public function update()
	{
		$fecharegistro = date("Y-m-d H:i:s");
		$idmedico = $this->input->post('codigo');
		$especialidad = $this->input->post('especialidad');
		$nombre = $this->input->post('nombre');
		$apellidos = $this->input->post('apellidos');
		$dni = $this->input->post('dni');
		$ruc = $this->input->post('ruc');
		$colegiatura = $this->input->post('colegiatura');
		$telefono = $this->input->post('telefono');
		$celular = $this->input->post('celular');
		$direccion =  $this->input->post('direccion');
		$email = $this->input->post('email');
		$fechanacimiento = $this->input->post('fechanacimiento');
		$sexo = $this->input->post('sexo');
		$estado = $this->input->post('estado');

		$MedicoActual = $this->medico_model->getmedico_id($codi_med);
		if($nombre == $MedicoActual->nomb_med){
			$is_unique ="";

		}else{
			$is_unique= '|is_unique[medico.nomb_med]';

		}
		$this->form_validation->set_rules("codigo","codigo","required");
		$this->form_validation->set_rules("especialidad","especialidad","required");
		$this->form_validation->set_rules("nombre","nombre","required");
		$this->form_validation->set_rules("apellidos","apellidos","required");
		$this->form_validation->set_rules("dni","Dni","required");
		$this->form_validation->set_rules("colegiatura","Colegiatura","required");
		$this->form_validation->set_rules("telefono","Telefono","required");
		$this->form_validation->set_rules("direccion","Direccion","required");
		$this->form_validation->set_rules("fechanacimiento","Fecha Nacimiento","required");
		$this->form_validation->set_rules("sexo","Sexo","required");
		$this->form_validation->set_rules("estado","Estado","required");

			if($this->form_validation->run()==true){
			$data = array(
				'codi_med' =>$idmedico,
				'cod_especialidad' =>$especialidad,
				'nomb_med' =>$nombre,
				'apel_med' =>$apellidos,
				'dni_med' =>$dni,
				'ruc_med' =>$ruc,
				'coleg_med' =>$colegiatura,
				'telf_med' =>$telefono,
				'cel_med'=>$celular,
				'dire_med' =>$direccion,
				'emai_med' =>$email,
				'fena_med' =>$fechanacimiento,
				'sexo_med' =>$sexo,
				'fecha_registro' =>$fecharegistro,
				'esta_med' => $estado
			);
			if($this->medico_model->update($idmedico,$data)){
				$this->session->set_flashdata('success', 'Actualizo correctamente los datos');
			redirect(base_url().'mantenimiento/medico');
		}
		else
		{
		$this->editar($idmedico);

		}

		}

		else{
			$this->editar($idmedico);
		}

	}

	function anularMedico()
	 {
		$where['codi_med'] = $this->input->get('id');
		$data['esta_med'] = N;//anulado
		$edit = $this->modelgeneral->editRegist('medico',$where,$data);
		$resp = [];
		if ($edit) {
			$resp['success'] = true;
		}else{
			$resp['success'] = false;
		}

		echo json_encode($resp);
	 }

}