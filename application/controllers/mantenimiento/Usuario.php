<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("user_model","Roles_model"));
		# code...
	}

	
	public function index()
	{
		$data =  array('user' => $this->user_model->getUser(),
					'rol'=>$this->Roles_model->getroles(),
				
		 );


		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuario/list_usuario',$data);
		$this->load->view('layouts/footer');


	}

	public function add()
	{	
		$data =  array('user' => $this->user_model->getUser(),
					'rol'=>$this->Roles_model->getroles(),
				
		 );
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuario/add',$data);
		$this->load->view('layouts/footer');
	}

	public function user_add()
	{		
			 $fecharegistro = date("Y-m-d H:i:s");
			 $apellido = $this->input->post('apellido');
			 $nombre = $this->input->post('nombre');
			 $telefono = $this->input->post('telefono');
			 $direccion = $this->input->post('direccion');
			 $email = $this->input->post('email');
			 $tipo_documento = $this->input->post('tipo_documento');
			 $documento = $this->input->post('documento');
			 $foto = $this->input->post('foto');
			 $codi_rol = $this->input->post('codi_rol');
			 $logi_usu = $this->input->post('logi_usu');
			 $pass_usu = sha1($this->input->post('pass_usu'));
			 $esta_usu = $this->input->post('esta_usu');
			 $data = array(
					'apellido' => $apellido,
					'nombre' => $nombre,
					'telefono' => $telefono,
					'direccion' => $direccion,
					'email' => $email,
					'tipo_documento' => $tipo_documento,
					'documento' => $documento,
					'foto' => $foto,
					'codi_rol' => $codi_rol,
					'logi_usu' => $logi_usu,
					'pass_usu' => $pass_usu,
					'fecha_registro' => $fecharegistro,
					'esta_usu'=> $esta_usu
		);
		if($this->user_model->agregarusuario($data)){
			redirect(base_url()."mantenimiento/usuario");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar el usuario");
			redirect(base_url()."mantenimiento/usuario/user_add");
		}
	
	}

	
	

	public function user_edit($id)
	{
		$data = $this->user_model->getuser_id($id);

		echo json_encode($data);
	}

	public function user_update()
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