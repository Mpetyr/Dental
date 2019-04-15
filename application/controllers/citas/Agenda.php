<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata("login")){
			redirect(base_url());
		}
		$this->load->model('modelgeneral');
		$this->load->model('citas_model');
		$this->load->helper('general');
	}

	public function index()
	{
		$data['especialidad'] = $this->db->from('especialidad')
														->order_by('nombre_especialidad','asc')
														->get()->result();
		$data['estados'] = $this->modelgeneral->getTable('tipo_citado');
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/citas/agenda',$data);
		$this->load->view('layouts/footer');
	}

	public function calendario()
	{
		//Capturar las fechas que envian desde el front
		$desde = date("Y-m-d", $this->input->get('from') / 1000);
		$hasta = strtotime('-1 day',$this->input->get('to') / 1000);
		$hasta = date("Y-m-d", $hasta);
		$anio = explode('-',$desde)[0];
		$mes = explode('-',$desde)[1];

		$medico = $this->input->get('medico');
		$especialidad = $this->input->get('especialidad');
		$estado = $this->input->get('estado');


		$data = [];
		$data['success'] = 1;

		$citas = $this->citas_model->getCitas($desde,$hasta,$medico,$especialidad,$estado);

		foreach ($citas as $c) {

			$result[] = [
				'id' => $c->codi_cit,
				"start" => strtotime(date($c->fech_cit)) * 1000, // Milliseconds
				"end" => strtotime('+15 minute',strtotime(date($c->fech_cit))) * 1000, //Milliseconds
				'class' => 'event-'.classAgendaCita($c->cod_citado),
				'title' => $c->nomb_pac.' '.$c->apel_pac,
				'url' => base_url('citas/agenda/getCita/'.$c->codi_cit)
			];
		}

		$data['success'] = 1;
		$data['result'] = $result;
		echo json_encode($data);
	}

	function getCita($id)
	{
		$data['cita'] = $this->citas_model->getCita($id);
		$this->load->view('admin/citas/modal_calendario',$data);
	}

}

/* End of file Agenda.php */
/* Location: ./application/controllers/citas/Agenda.php */