<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Regpersona extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('user_model');
		$this->load->model('modelgeneral');
		$this->load->library('email');
		$this->load->helper('general');
	}

	public function index()
	{
			$data['roles'] = $this->modelgeneral->getTable('rol');
			$this->load->view('admin/usuario/registrar',$data);

	}

	public function validaEmail()
	{
		if ($this->input->is_ajax_request()) {
			$email = $this->input->get('email');
			$verifica = $this->modelgeneral->verificaUnico('usuario','email',$email);
			if ($verifica) {
				echo 'true';
			}else{
				echo 'false';
			}
		}
	}

		public function verificaEmailPassword()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('pass_usu');
		$result = $this->modellogin->user_model($email, $password);
		if($result){
			return TRUE;
		}else{
			$this->form_validation->set_message('verificaEmailPassword','El email o la contraseña son incorrectas.');
			return FALSE;
		}
	}


	public function guardarusuario()
	{
		
		$this->form_validation->set_rules('apellidos','','required');
		$this->form_validation->set_rules('nombres','','required');
		$this->form_validation->set_rules('tipo_documento','','required');
		$this->form_validation->set_rules('documento','','required');
		$this->form_validation->set_rules('tipo_usuario','','required');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[usuario.email]');
		$this->form_validation->set_rules('usuario','','required|is_unique[usuario.logi_usu]');
		$this->form_validation->set_rules('password','','required');
		$this->form_validation->set_rules('passconf', '', 'required|matches[password]');
		if ($this->form_validation->run() == TRUE) {
			$data['apellido']= $this->input->post('apellidos');
			$data['nombre']= $this->input->post('nombres');
			$data['email']= $this->input->post('email');
			$data['tipo_documento']= $this->input->post('tipo_documento');
			$data['documento']= $this->input->post('documento');
			$data['codi_rol']= $this->input->post('tipo_usuario');
			$data['logi_usu']= $this->input->post('usuario');
			$data['pass_usu']=sha1($this->input->post('password')) ;
			$data['fecha_registro']= date("Y-m-d H:i:s");
			$data['esta_usu'] = 1;
			$insert = $this->modelgeneral->insertRegist('usuario',$data);
			$resp =[];
			if (!is_null($insert)) {
				if ($this->input->post('notificar')=='on') {
					$this->enviarNotificacion($insert);
				}
				$resp['success'] = true;
				
			}else{
				$resp['success'] = false;
			}

				echo json_encode($resp);
				 redirect(base_url().'auth');
			}
		
		
	 }

	 	function enviarNotificacion($id)
		{
		$data['usuarios'] = $this->modelgeneral->getTableWhereRow('usuario',['codi_usu'=>$id]);
		$mensaje = $this->load->view('admin/usuario/notificacion',$data,TRUE);
		$config['protocol'] = 'mail'; 
   		 $config['mailtype'] = 'html'; 
   		 $this->email->initialize($config); 
   		 $this->email->from('sysdentalsac@gmail.com','Sistema Dental'); 
    	$this->email->to($data['usuarios']->email); 
   		 $this->email->subject('Notificación de Clinica Dental'); 
   		 $this->email->message($mensaje); 
   	//	 $this->email->send(); 
		}


	}
