<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("roles_model");
		# code...
	}

	
	public function index()
	{
		$data =  array('rol' => $this->roles_model->getRoles(),
		 );


		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/rol/list_rol',$data);
		$this->load->view('layouts/footer');
	}

	public function add()
	{
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/rol/add_rol');
		$this->load->view('layouts/footer');
	}

	public function rol_add()
	{
		 $nombre = $this->input->post("nomb_rol");
		$data = array(
			'nomb_rol' => $nombre,
			'esta_rol'=> "1"
		);
		if($this->roles_model->add($data)){
			redirect(base_url()."mantenimiento/rol");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar el rol");
			redirect(base_url()."mantenimiento/rol/add");
		}
	
	}

	public function roles_edit($id)
	{
		$data = $this->roles_model->getRoles_Id($id);

		echo json_encode($data);
	}

	public function roles_update()
	{
		$data = array(
			'nomb_rol' => $this->input->post('nomb_rol'),
		);
		$this->roles_model->rol_update(array('codi_rol' => $this->input->post('codi_rol')),$data);
		echo json_encode(array("status" => TRUE));

	}

	public function delete($id)
	{
		$data = array(
			'esta_rol'=> "0",);
		$this->roles_model->update_rol($id,$data);
		redirect('mantenimiento/rol') ;
		
	}
}