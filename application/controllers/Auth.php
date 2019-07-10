<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Auth extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("usuarios_model");
		$this->load->model("clinica_model");
		# code...
	}

	public function index()
	{
		if ($this->session->userdata("login")) {
			redirect(base_url()."dashboard");
		} else {
			$this->load->view('admin/login');
		}
		
	}

	public function login()
	{
		$username= $this->input->post("username");
		$paswoord= $this->input->post("paswoord");
		$res = $this->usuarios_model->login($username,sha1($paswoord));
		$logo =$this->clinica_model->getclinica($data);
		if(!$res){
			$this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
			redirect(base_url());

		}
		else
		{
			$data =  array(
			'codi_usu' => $res->codi_usu,
			'apellido' => $res->apellido,
			'nombre' => $res->nombre,
			'rol' => $res->codi_rol,
			'tipo_documento' => $res->tipo_documento,
			'logi_usu' =>$res->logi_usu,
			'pass_usu' =>$res->pass_usu,
			'foto' => $logo->photo,
			'login' => TRUE
			 );
			$this->session->set_userdata($data);
			redirect(base_url()."dashboard");
		}
	}

		public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}