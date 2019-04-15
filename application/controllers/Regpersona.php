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
	}

	public function index()
	{
			$data['roles'] = $this->modelgeneral->getTable('rol');
			$this->load->view('admin/usuario/registrar',$data);
	}
}