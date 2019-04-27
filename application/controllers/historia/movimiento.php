<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Movimiento extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata("login")){
			redirect(base_url());
		}
		$this->load->model('historia_model');
	}

	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/historia/movimiento/panel');
		$this->load->view('layouts/footer');
	}

	public function jsonHistoriaClinica()
	{
		$data['start'] = $this->input->get_post('start', true);
		$data['length'] = $this->input->get_post('length', true);
		$data['sEcho']  = $this->input->get_post('_', true);

		$columns = array('codi_pac','NombresApellidos');
		$orderCampo = $this->input->get_post('order', true);
		$orderCampo = $orderCampo[0]['column'];
		$orderCampo = $columns[$orderCampo];
		$orderDireccion = $this->input->get_post('order', true);
		$orderDireccion = $orderDireccion[0]['dir'];
		$data['orderCampo'] = $orderCampo;
		$data['orderDireccion'] = $orderDireccion;
		
		$desde = $this->input->get_post('desde');
		$hasta = $this->input->get_post('hasta');
		$nombresApellidos = $this->input->get_post('nombresApellidos');

		$data['desde'] = $desde;
		$data['hasta'] = $hasta;
		if ($nombresApellidos!='') {
			$data['nombresApellidos'] = $nombresApellidos;
		}
		
		$datos = $this->historia_model->getHistoria($data);
		header('content-type: application/json; charset=utf-8');
		echo json_encode($datos);
	}

	function historia($id)
	{
		$data['paciente'] = $this->modelgeneral->getTableWhereRow('paciente',['codi_pac'=>$id]);
		$data['departamentos'] = $this->modelgeneral->getTable('departamento');
		$data['provincias'] = $this->modelgeneral->getTableWhere('provincia',['departamento_id'=>$data['paciente']->departamento_id]);
		$data['distritos'] = $this->modelgeneral->getTableWhere('distrito',['provincia_id'=>$data['paciente']->provincia_id]);
		$data['alergias'] = $this->modelgeneral->getTable('alergia');
		$data['enfermedad'] = $this->modelgeneral->getTableWhereRow('paciente_enfermedadactual',['codi_pac'=>$id]);
		$data['consulta'] = $this->modelgeneral->getTableWhereRow('paciente_consulta',['codi_pac'=>$id]);
		$data['exploracion'] = $this->modelgeneral->getTableWhereRow('paciente_exploracion',['codi_pac'=>$id]);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/historia/movimiento/historia',$data);
		$this->load->view('layouts/footer');
	}

	public function guardarPacienteEnfermedad()
	{
		$data['tiempo_enfact'] = $this->input->post('tiempoEnfermedad');
		$data['motivo_enfact'] = $this->input->post('motivoConsulta');
		$data['signo_enfact'] = $this->input->post('signosSintomas');
		$data['antecper_enfact'] = $this->input->post('antecedentesPersonales');
		$data['antecfam_enfact'] = $this->input->post('antecedentesFamiliares');
		if (isset($_POST['tomandoMedicamento'])) {
			$data['medicam_enfact'] = $this->input->post('tomandoMedicamento');
		}
		$data['nommedicam_enfact'] = $this->input->post('nombreMedicamento');
		$data['motivomedi_enfact'] = $this->input->post('motivoUso');
		$data['dosis_enfact'] = $this->input->post('dosis');
		$where['codi_pac'] = $this->input->post('paciente');
		$edit = $this->modelgeneral->editRegist('paciente_enfermedadactual',$where,$data);
		$resp = [];
		if ($edit) {
			$resp['success'] = true;
		}else{
			$resp['success'] = false;
		}
		echo json_encode($resp);
	}

	public function guardarPacienteConsulta()
	{
		if (isset($_POST['algunaVezMedicamento'])) {
			$data['ortod_paccon'] = $this->input->post('algunaVezMedicamento');
		}
		$data['ortodtexto_paccon'] = $this->input->post('algunaVezMedicamentoTexto');

		if (isset($_POST['tomandoMedicamentoConsulta'])) {
			$data['medic_paccon'] = $this->input->post('tomandoMedicamentoConsulta');
		}
		$data['medictexto_paccon'] = $this->input->post('tomandoMedicamentoTexto');

		if (isset($_POST['alergicoAnestesico'])) {
			$data['alergico_paccon'] = $this->input->post('alergicoAnestesico');
		}
		$data['alergicotexto_paccon'] = $this->input->post('alergicoAnestesicoTexto');

		if (isset($_POST['hospitalizadoCirugia'])) {
			$data['hosp_paccon'] = $this->input->post('hospitalizadoCirugia');
		}
		$data['hosptexto_paccon'] = $this->input->post('hospitalizadoCirugiaTexto');

		if (isset($_POST['transtornoNerviosoEmocional'])) {
			$data['trans_paccon'] = $this->input->post('transtornoNerviosoEmocional');
		}
		$data['transtexto_paccon'] = $this->input->post('transtornoNerviosoEmocionalTexto');

		if (isset($_POST['padeceEnfermedad'])) {
			$data['padece_paccon'] = $this->input->post('padeceEnfermedad');
		}

		if (isset($_POST['cepillaDientes'])) {
			$data['cepilla_paccon'] = $this->input->post('cepillaDientes');
		}
		$data['cepillatexto_paccon'] = $this->input->post('cepillaDientesTexto');

		if (isset($_POST['presionArterial'])) {
			$data['presion_paccon'] = $this->input->post('presionArterial');
		}
		$data['presiontexto_paccon'] = $this->input->post('presionArterialTexto');

		$where['codi_pac'] = $this->input->post('paciente');
		$edit = $this->modelgeneral->editRegist('paciente_consulta',$where,$data);
		$resp = [];
		if ($edit) {
			$resp['success'] = true;
		}else{
			$resp['success'] = false;
		}
		echo json_encode($resp);
	}

	public function guardarPacienteExploracion()
	{
		$data['pa_exp'] = $this->input->post('PA');
		$data['pulso_exp'] = $this->input->post('pulso');
		$data['temperat_exp'] = $this->input->post('temperatura');
		$data['fc_exp'] = $this->input->post('FC');
		$data['frec_exp'] = $this->input->post('frecRep');
		$data['clinico_exp'] = $this->input->post('examenClinicoGeneral');
		$data['complement_exp'] = $this->input->post('examenComplementario');
		$data['odontoesto_exp'] = $this->input->post('odontoestomatologico');

		$where['codi_pac'] = $this->input->post('paciente');
		$edit = $this->modelgeneral->editRegist('paciente_exploracion',$where,$data);
		$resp = [];
		if ($edit) {
			$resp['success'] = true;
		}else{
			$resp['success'] = false;
		}
		echo json_encode($resp);
	}

	public function jsonAlergias()
	{
		$data['start'] = $this->input->get_post('start', true);
		$data['length'] = $this->input->get_post('length', true);
		$data['sEcho']  = $this->input->get_post('_', true);

		$columns = array('pacale_id','nombre_ale');
		$orderCampo = $this->input->get_post('order', true);
		$orderCampo = $orderCampo[0]['column'];
		$orderCampo = $columns[$orderCampo];
		$orderDireccion = $this->input->get_post('order', true);
		$orderDireccion = $orderDireccion[0]['dir'];
		$data['orderCampo'] = $orderCampo;
		$data['orderDireccion'] = $orderDireccion;
		$data['paciente'] = $this->input->get_post('paciente');		
		$datos = $this->historia_model->getAlergias($data);
		header('content-type: application/json; charset=utf-8');
		echo json_encode($datos);
	}

	function agregarAlergia()
	{
		$this->form_validation->set_rules('paciente', '', 'required');
		$this->form_validation->set_rules('alergia', '', 'required');
		if ($this->form_validation->run() == TRUE){
			$data['codi_pac'] = $this->input->post('paciente');
			$data['cod_ale'] = $this->input->post('alergia');
			$data['pacale_observacion'] = $this->input->post('observacion');
			$insert  = $this->modelgeneral->insertRegist('paciente_alergia',$data);

			$resp = [];
			if (!is_null($insert)){
				$resp['success'] = true;
			}else{
				$resp['success'] = false;
			}
			echo json_encode($resp);
		}
	}

	function anularAlergia()
	{
		$where['pacale_id'] = $this->input->get('id');
		$delete = $this->modelgeneral->deleteRegist('paciente_alergia',$where);

		$resp = [];
		if ($delete) {
			$resp['success'] = true;
		}else{
			$resp['success'] = false;
		}
		echo json_encode($resp);
	}

}

/* End of file movimiento.php */
/* Location: ./application/controllers/historia/movimiento.php */