<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('login')){
		// 	redirect(base_url());
		// }

		$this->load->model('pacientes_model');
		# code...
	}


	public function index()
	{

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/paciente/listarpaciente');
		$this->load->view('layouts/footer');


	}

	public function jsonpaciente()
	{
		$data['start'] = $this->input->get_post('start', true);
		$data['length'] = $this->input->get_post('length', true);
		$data['sEcho']  = $this->input->get_post('_', true);
		$columns = array('codi_pac','NombrePaciente','edad_pac','dni_pac','dire_pac','fecha_registro','esta_pac');
		$orderCampo = $this->input->get_post('order', true);
		$orderCampo = $orderCampo[0]['column'];
		$orderCampo = $columns[$orderCampo];
		$orderDireccion = $this->input->get_post('order', true);
		$orderDireccion = $orderDireccion[0]['dir'];
		$data['orderCampo'] = $orderCampo;
		$data['orderDireccion'] = $orderDireccion;
		$desde = $this->input->get_post('desde');
		$hasta = $this->input->get_post('hasta');
		$paciente = $this->input->get_post('paciente');

		if ($desde!='' AND $hasta!='') {
			$data['desde'] = $desde;
			$data['hasta'] = $hasta;
		}
		if ($paciente!='') {
			$data['paciente'] = $paciente;
		}
		$datos = $this->pacientes_model->getpaciente($data);
		header('content-type: application/json; charset=utf-8');
		echo json_encode($datos);
	}



	public function add()
	{

		$data['departamentos'] = $this->modelgeneral->getTable('departamento');
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/paciente/agregarpaciente',$data);
		$this->load->view('layouts/footer');
	}



	public function getProvincias()
	{
		if($this->input->is_ajax_request()){
			$departamento = $this->input->get('departamento');
			$provincias = $this->modelgeneral->getTableWhere('provincia',['departamento_id'=>$departamento]);
			echo json_encode($provincias);
		}
	}

	public function getDistritos()
	{
			if($this->input->is_ajax_request()){
			$provincia = $this->input->get('provincia');
			$distritos = $this->modelgeneral->getTableWhere('distrito',['provincia_id'=>$provincia]);
			echo json_encode($distritos);
		}
	}

	public function guardar()
	{

		$this->form_validation->set_rules('nombre','','requerid');
		$this->form_validation->set_rules('apellidos','','requerid');
		$this->form_validation->set_rules('edad','','requerid');
		$this->form_validation->set_rules('ocupacion','','requerid');
		$this->form_validation->set_rules('lugarnacimiento','','requerid');
		$this->form_validation->set_rules('direccion','','requerid');
		$this->form_validation->set_rules('telefono','','requerid');
		$this->form_validation->set_rules('dni','','requerid');
		$this->form_validation->set_rules('fechanacimiento','','requerid');
		$this->form_validation->set_rules('sexo','','requerid');
		$this->form_validation->set_rules('estadocivil','','requerid');
		$this->form_validation->set_rules('email','','requerid');

		$data = array(
			
			'nomb_pac' => $this->input->post('nombre'),
			'apel_pac' => $this->input->post('apellidos'),
			  'edad_pac' => $this->input->post('edad'),
			  'ocupacion' =>$this->input->post('ocupacion'),
			 'lugar_nacimiento' => $this->input->post('lugarnacimiento'),
			 'informacion_clinica' => $this->input->post('informacionclinica'),
			  'dire_pac'  => $this->input->post('direccion'),
			 'telf_pac' => $this->input->post('telefono'),
			 'dni_pac' =>$this->input->post('dni'),
			 'fena_pac' => $this->input->post('fechanacimiento'),
			 'sexo_pac' => $this->input->post('sexo'),
			 'civi_pac' =>$this->input->post('estadocivil'),
			'afil_pac' => $this->input->post('afiliado'),
			 'aler_pac' => $this->input->post('alergia'),
			  'emai_pac' => $this->input->post('email'),
			 'departamento_id' => $this->input->post('departamento'),
			 'provincia_id' => $this->input->post('provincia'),
			 'distrito_id' => $this->input->post('distrito'),
			  'observacion'=> $this->input->post('observacion'),
			  'esta_pac' => $this->input->post('estado')
		);

		$insert = $this->pacientes_model->agregarpaciente($data);
		$primary['codi_pac'] = $insert;
		$this->modelgeneral->insertRegist('paciente_enfermedadactual',$primary);
		$this->modelgeneral->insertRegist('paciente_consulta',$primary);
		$this->modelgeneral->insertRegist('paciente_exploracion',$primary);

		echo json_encode(array("status" => TRUE));
		redirect(base_url().'mantenimiento/paciente');

	// else{
	// 	ECHO '<PRE>';
	// 	var_dump($_POST);
	// 	echo 'error validacion';
	// }

		


}


private function _do_upload()
	{
		$config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	public function paciente_edit($id)
	{
		$data = $this->pacientes_model->getpacientes_id($id);

		echo json_encode($data);
	}

	public function paciente_update()
	{
		$fecha_registro = date("Y-m-d H:i:s");
		$data = array(
			'apellido' => $this->input->post('apellido'),
			'nombre' => $this->input->post('nombre'),
			'telefono' => $this->input->post('telefono'),
			'direccion' => $this->input->post('direccion'),
			'email' => $this->input->post('email'),
			'tipo_documento' => $this->input->post('tipo_documento'),
			'documento' => $this->input->post('documento'),
			'foto' => $this->input->post('foto'),
			'codi_rol' =>  $this->input->post('codi_rol'),
			'logi_usu' =>  $this->input->post('logi_usu'),
			'pass_usu' =>  sha1($this->input->post('pass_usu')),
			'fecha_registro' =>  $fecha_registro,
			'esta_usu'=>$this->input->post('esta_usu'),

		);
		$this->user_model->user_update(array('codi_usu' => $this->input->post('codi_usu')),$data);
		echo json_encode(array("status" => TRUE));

	}

	public function delete($id)
	{
		$data = array(
			'esta_usu'=> "0",);
		$this->user_model->update_user($id,$data);
		// echo json_encode(array("status" => TRUE));
			 redirect ('mantenimiento/usuario');

	}



}
