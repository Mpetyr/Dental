<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Permisos_model","Roles_model"));

		# code...
	}

	public function index()
		{

		$data =  array(
			'permisos' => $this->Permisos_model->getPermisos(),
			
		 );
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');		
		$this->load->view('admin/usuario/list_permisos',$data);
		$this->load->view('layouts/footer');

		}


		public function add()
		{

		$data =  array(
			'rol' => $this->Roles_model->getRoles(),
			'menus' => $this->Permisos_model->getMenus(),
			
		 );
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');		
		$this->load->view('admin/usuario/add',$data);
		$this->load->view('layouts/footer');

		}


		public function store()
		{
			$menu = $this->input->post("id_menu");
			$rol = $this->input->post("id_rol");
			$insert = $this->input->post("insert");
			$read = $this->input->post("read");
			$update = $this->input->post("update");
			$delete = $this->input->post("delete");


			$data = array(
				"id_menu" => $menu,
				"id_rol" => $rol,
				"read" => $read,
				"insert" => $insert,
				"update" => $update,
				"delete" => $delete,
			);

			if ($this->Permisos_model->save($data)) {
				redirect(base_url()."mantenimiento/permisos");
			}else{
				$this->session->set_flashdata("error","No se pudo guardar la información");
					redirect(base_url()."mantenimiento/permisos/add");
			}


		}

		public function edit($id)
		{
			$data =  array(
			'rol' => $this->Roles_model->getRoles(),
			'menus' => $this->Permisos_model->getMenus(),
			'permiso' => $this->Permisos_model->getPermiso($id),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');		
		$this->load->view('admin/usuario/edit',$data);
		$this->load->view('layouts/footer');

		}

		public function update()
		{
			$id_permiso = $this->input->post("id_permiso");
			$menu = $this->input->post("id_menu");
			$rol = $this->input->post("id_rol");
			$insert = $this->input->post("insert");
			$read = $this->input->post("read");
			$update = $this->input->post("update");
			$delete = $this->input->post("delete");


			$data = array(
				"id_menu" => $menu,
				"id_rol" => $rol,
				"read" => $read,
				"insert" => $insert,
				"update" => $update,
				"delete" => $delete,
			);

			if ($this->Permisos_model->update($id_permiso,$data)) {
				redirect(base_url()."mantenimiento/permisos");
			}else{
				$this->session->set_flashdata("error","No se pudo guardar la información");
					redirect(base_url()."mantenimiento/permisos/edit/".$id_permiso);
			}


		}

		public function delete($id){
			$this->Permisos_model->delete($id);
			redirect(base_url()."mantenimiento/permisos");
		}




}