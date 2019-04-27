<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
		$data['paises'] = $this->modelgeneral->getTable('paises');
		$data['diagnosticos'] = $this->modelgeneral->getTableWhere('enfermedad',['esta_enf'=>'A']);
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

	public function guardarDatosPaciente()
	{
		$data['nomb_pac'] = $this->input->post('nombres');
		$data['apel_pac'] = $this->input->post('apellidos');
		$data['fena_pac'] = $this->input->post('fechaNacimiento');
		$data['edad_pac'] = $this->input->post('edad');
		$data['dni_pac'] = $this->input->post('dni');
		$data['dire_pac'] = $this->input->post('direccion');
		$data['sexo_pac'] = $this->input->post('genero');
		$data['telf_pac'] = $this->input->post('telefono');
		$data['ocupacion'] = $this->input->post('ocupacion');
		$data['estudios_pac'] = $this->input->post('estudios');
		$data['civi_pac'] = $this->input->post('estadoCivil');
		$data['emai_pac'] = $this->input->post('email');
		$data['pais_id'] = $this->input->post('pais');
		$data['departamento_id'] = $this->input->post('departamento');
		$data['provincia_id'] = $this->input->post('provinca');
		$data['distrito_id'] = $this->input->post('distrito');

		$where['codi_pac'] = $this->input->post('paciente');
		$edit = $this->modelgeneral->editRegist('paciente',$where,$data);
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
		$data['peso_exp'] = $this->input->post('peso');
		$data['talla_exp'] = $this->input->post('talla');
		$data['masa_exp'] = $this->input->post('masa');
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

	function getAlergia()
	{
		$id = $this->input->get('id');
		$alergia = $this->modelgeneral->getTableWhereRow('paciente_alergia',['pacale_id'=>$id]);
		echo json_encode($alergia);
	}

	function editarAlergia()
	{
		$this->form_validation->set_rules('id', '', 'required');
		$this->form_validation->set_rules('paciente', '', 'required');
		$this->form_validation->set_rules('alergia', '', 'required');
		if ($this->form_validation->run() == TRUE){
			$data['cod_ale'] = $this->input->post('alergia');
			$data['pacale_observacion'] = $this->input->post('observacion');
			$where['pacale_id'] = $this->input->post('id');
			$edit  = $this->modelgeneral->editRegist('paciente_alergia',$where,$data);

			$resp = [];
			if ($edit){
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
		$data['pacale_estado'] = 2;//anulado
		$edit = $this->modelgeneral->editRegist('paciente_alergia',$where,$data);
		$resp = [];
		if ($edit) {
			$resp['success'] = true;
		}else{
			$resp['success'] = false;
		}

		echo json_encode($resp);
	}

	function jsonRecetas()
	{
		$data['start'] = $this->input->get_post('start', true);
		$data['length'] = $this->input->get_post('length', true);
		$data['sEcho']  = $this->input->get_post('_', true);

		$columns = array('pacrec_id','pacrec_asunto');
		$orderCampo = $this->input->get_post('order', true);
		$orderCampo = $orderCampo[0]['column'];
		$orderCampo = $columns[$orderCampo];
		$orderDireccion = $this->input->get_post('order', true);
		$orderDireccion = $orderDireccion[0]['dir'];
		$data['orderCampo'] = $orderCampo;
		$data['orderDireccion'] = $orderDireccion;
		$data['paciente'] = $this->input->get_post('paciente');		
		$datos = $this->historia_model->getRecetas($data);
		header('content-type: application/json; charset=utf-8');
		echo json_encode($datos);
	}

	public function agregarReceta()
	{
		$data['codi_pac'] = $this->input->post('paciente');
		$data['pacrec_fecha'] = date('Y-m-d');
		$data['pacrec_hora'] = date('H:i:s');
		$data['pacrec_asunto'] = $this->input->post('asunto');
		$data['pacrec_receta'] = $this->input->post('receta');
		$data['codi_med'] = 1;//ID DE MEDICO
		if ($this->input->post('diagnostico01')!='') {
			$data['codi_enf01'] = $this->input->post('diagnostico01');
		}else{
			$data['codi_enf01'] = null;
		}

		if ($this->input->post('diagnostico02')!='') {
			$data['codi_enf02'] = $this->input->post('diagnostico02');
		}else{
			$data['codi_enf02'] = null;
		}

		if ($this->input->post('diagnostico03')!='') {
			$data['codi_enf03'] = $this->input->post('diagnostico03');
		}else{
			$data['codi_enf03'] = null;
		}
		$data['pacrec_indicaciones'] = $this->input->post('indicaciones');

		$insert  = $this->modelgeneral->insertRegist('paciente_receta',$data);
		$resp = [];
		if (!is_null($insert)) {
			$resp['success'] = true;
		}else{
			$resp['success'] = false;
		}
		echo json_encode($resp);
	}

	function getReceta()
	{
		$id = $this->input->get('id');
		$receta = $this->modelgeneral->getTableWhereRow('paciente_receta',['pacrec_id'=>$id]);
		echo json_encode($receta);
	}

	function editarReceta()
	{
		$data['pacrec_asunto'] = $this->input->post('asunto');
		$data['pacrec_receta'] = $this->input->post('receta');
		if ($this->input->post('diagnostico01')!='') {
			$data['codi_enf01'] = $this->input->post('diagnostico01');
		}else{
			$data['codi_enf01'] = null;
		}

		if ($this->input->post('diagnostico02')!='') {
			$data['codi_enf02'] = $this->input->post('diagnostico02');
		}else{
			$data['codi_enf02'] = null;
		}

		if ($this->input->post('diagnostico03')!='') {
			$data['codi_enf03'] = $this->input->post('diagnostico03');
		}else{
			$data['codi_enf03'] = null;
		}
		$data['pacrec_indicaciones'] = $this->input->post('indicaciones');

		$where['pacrec_id'] = $this->input->post('id');
		$edit = $this->modelgeneral->editRegist('paciente_receta',$where,$data);
		$resp = [];
		if ($edit) {
			$resp['success'] = true;
		}else{
			$resp['success'] = false;
		}
		echo json_encode($resp);
	}

	function anularReceta()
	{
		$data['pacrec_estado'] = 2; //ANULAR
		$where['pacrec_id'] = $this->input->get('id');
		$edit = $this->modelgeneral->editRegist('paciente_receta',$where,$data);
		$resp = [];
		if ($edit) {
			$resp['success'] = true;
		}else{
			$resp['success'] = false;
		}
		echo json_encode($resp);
	}

	function jsonPlacas()
	{
		$data['start'] = $this->input->get_post('start', true);
		$data['length'] = $this->input->get_post('length', true);
		$data['sEcho']  = $this->input->get_post('_', true);

		$columns = array('pla_fecha','pla_nombre');
		$orderCampo = $this->input->get_post('order', true);
		$orderCampo = $orderCampo[0]['column'];
		$orderCampo = $columns[$orderCampo];
		$orderDireccion = $this->input->get_post('order', true);
		$orderDireccion = $orderDireccion[0]['dir'];
		$data['orderCampo'] = $orderCampo;
		$data['orderDireccion'] = $orderDireccion;
		$data['paciente'] = $this->input->get_post('paciente');		
		$datos = $this->historia_model->getPlacas($data);
		header('content-type: application/json; charset=utf-8');
		echo json_encode($datos);
	}

	function subir()
	{
		$config['upload_path'] = 'assets/uploads/placas/';
		$config['allowed_types'] = 'pdf|png|jpg|jpeg';
		$config['max_size'] = '30000';
		$config['max_width'] = '30000';
		$config['max_height'] = '30000';
		$this->upload->initialize($config);
		if ($this->upload->do_upload('placaArchivo')){
			$upload = $this->upload->data();
			
			$resp = [];
			$resp['success'] = 1;
			$resp['name'] = $upload['file_name'];
			echo json_encode($resp);
		}
	}

	function agregarPlaca()
	{
		$data['codi_pac'] = $this->input->post('paciente');
		$data['pla_nombre'] = $this->input->post('nombre');
		$data['pla_notas'] = $this->input->post('notas');
		$data['pla_archivo'] = $this->input->post('archivo');
		$insert  = $this->modelgeneral->insertRegist('paciente_placa',$data);
		$resp = [];
		if (!is_null($insert)){
			$resp['success'] = true;
		}else{
			$resp['success'] = false;
		}
		echo json_encode($resp);
	}

	function anularPlaca()
	{
		$data['pla_estado'] = 2; //ANULAR
		$where['pla_id'] = $this->input->get('id');
		$edit = $this->modelgeneral->editRegist('paciente_placa',$where,$data);
		$resp = [];
		if ($edit) {
			$resp['success'] = true;
		}else{
			$resp['success'] = false;
		}
		echo json_encode($resp);
	}

}

/* End of file movimiento.php */
/* Location: ./application/controllers/historia/movimiento.php */