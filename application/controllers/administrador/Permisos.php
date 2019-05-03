<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */

/**
 * 
 */
class permisos extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata("login")){
			redirect(base_url());
		}
		$this->load->model('permisos_model');
		$this->load->model('roles_model');
	}

	public function index()
	{
		$data = array(
			'permisos' => $this->permisos_model->getPermisos(),
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/permisos/listar',$data);
		$this->load->view('layouts/footer');
	}

	public function add(){

		$data = array(
			'roles' => $this->roles_model->getroles(),
			'menus' => $this->permisos_model->getMenus(),

		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/permisos/add',$data);
		$this->load->view('layouts/footer');
	}


	public function store(){
		$menu =$this->input->post('menu');
		$rol = $this->input->post('rol');
		$read= $this->input->post('read');
		$insert = $this->input->post('insert');
		$update = $this->input->post('update');
		$delete = $this->input->post('delete');

		$data = array(

		'id_menu' => $menu,
		'codi_rol' => $rol,
		'read' => $read,
		'insert' =>$insert,
		'update' =>$update,
		'delete' =>$delete,	
		);

		if($this->permisos_model->save($data)){
			redirect(base_url().'administrador/permisos');
		}else{
			$this->session->set_flashdata('error','no se pudo guardar la informacion');
			redirect(base_url().'administrador/permisos/add');
		}
	}

	public function edit($id){
		$data = array(
			'roles' => $this->roles_model->getroles(),
			'menus' => $this->permisos_model->getMenus(),
			'permiso' => $this->permisos_model->getPermiso($id),
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/permisos/edit',$data);
		$this->load->view('layouts/footer');


	}

	public function update(){
		$idpermiso = $this->input->post('idpermiso');
		$menu =$this->input->post('menu');
		$rol = $this->input->post('rol');
		$read= $this->input->post('read');
		$insert = $this->input->post('insert');
		$update = $this->input->post('update');
		$delete = $this->input->post('delete');

			$data = array(
		'read' => $read,
		'insert' =>$insert,
		'update' =>$update,
		'delete' =>$delete,	
		);

			if($this->permisos_model->update($idpermiso,$data)){
			redirect(base_url().'administrador/permisos');
		}else{
			$this->session->set_flashdata('error','no se pudo guardar la informacion');
			redirect(base_url().'administrador/permisos/edit');
		}

	}
}