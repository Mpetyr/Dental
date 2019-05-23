$(function(){
var seleccionado = '';
$('.odontograma-navegacion a').click(function(event) {
	event.preventDefault();
});

/*=================================================
=            SELECCIONANDO EL HALLAZGO            =
=================================================*/
$('.odontograma-item').click(function(event) {
	var hallazgo = $(this).data('hallazgo');
	var estado = $(this).data('estado');
	var sigla = $(this).data('sigla');
	$('#FormHistoriaMovimientoAgregarHallazgo input[name=hallazgo], #FormHistoriaMovimientoAgregarHallazgo input[name=estado], #FormHistoriaMovimientoAgregarHallazgo input[name=sigla], #FormHistoriaMovimientoAgregarHallazgo input[name=diente]').val('');

	var hallazgoSeleccionado = $(this).parent().parent().parent().find('a.nombreHallazgo')[0];
	$('#BotonNombreSeleccionado').show().html(hallazgoSeleccionado.innerText);

	$('#odontograma-contenido').removeClass('unico inicio fin');
	if ($(hallazgoSeleccionado).hasClass('rango')) {
		$('#odontograma-contenido').addClass('inicio');
	}else{
		$('#odontograma-contenido').addClass('unico');
	}

	$('#modalHallazgo').val(hallazgoSeleccionado.innerText);

	$('#colEstado').show();
	$('#colSigla').show();
	$('#BotonNombreSeleccionado').removeClass('btn-default btn-success btn-danger');
	if (estado=='bueno') {
		$('#modalEstado').val('Buen Estado');
		$('#FormHistoriaMovimientoAgregarHallazgo input[name="estado"]').val('bueno');
    $('#BotonNombreSeleccionado').addClass('btn-success');
	}
	if (estado=='malo') {
		$('#modalEstado').val('Mal Estado');
		$('#FormHistoriaMovimientoAgregarHallazgo input[name="estado"]').val('malo');
		$('#BotonNombreSeleccionado').addClass('btn-danger');	
	}
	if (typeof estado === "undefined") {
		$('#colEstado').hide();
		$('#FormHistoriaMovimientoAgregarHallazgo input[name="estado"]').val('');
	  $('#BotonNombreSeleccionado').addClass('btn-default');	
	}

	if (typeof sigla === "undefined") {
		$('#colSigla').hide();
		$('#FormHistoriaMovimientoAgregarHallazgo input[name="sigla"]').val('');
	}else{
		$('#FormHistoriaMovimientoAgregarHallazgo input[name="sigla"]').val(sigla);
	}
	$('#BotonSeleccion').removeClass('btn-default').addClass('btn-info').html('Quitar Selección');
	
	$('#FormHistoriaMovimientoAgregarHallazgo input[name=hallazgo]').val(hallazgo);
});


$('#BotonSeleccion').click(function(event) {
	$(this).html('Seleccione');
	$('#odontograma-contenido').removeClass('unico inicio fin');
	$('#BotonNombreSeleccionado').hide();
});
/*=====  End of SELECCIONANDO EL HALLAZGO  ======*/

/*===============================================
=            SELECCIONANDO EL DIENTE            =
===============================================*/
$('#odontograma').on('click', '#odontograma-contenido.unico>.cursor', function(event) {
	event.preventDefault();
	var diente = $(this).data('diente');
	$('#ModalAgregarHallazgo').modal();
	$('#FormHistoriaMovimientoAgregarHallazgo input[name=diente]').val(diente);
});

$('#odontograma').on('click', '#odontograma-contenido.inicio>.cursor', function(event) {
	event.preventDefault();
	$('#odontograma-contenido.inicio').removeClass('inicio').addClass('fin');
});
/*=====  End of SELECCIONANDO EL DIENTE  ======*/


/*var numeroToDientes = {
	1:18, 2:17, 3:16, 4:15, 5:14, 6:13, 7:12, 8:11, 9:21, 10:22, 11:23, 12:24, 13:25, 14:26, 15:27, 16:28,
	17:55, 18:54, 19:53, 20:52, 21:51, 22:61, 23:62, 24:63, 25:64, 26:65,
	27:85, 28:84, 29:83, 30:82, 31:81, 32:71, 33:72, 34:73, 35:74, 36:75,
	 37:48, 38:47, 39:46, 40:45, 41:44, 42:43, 43:42, 44:41, 45:31, 46:32, 47:33, 48:34, 49:35, 50:36, 51:37, 52:38
};

var dientesToNumero = {
	18:1, 17:2, 16:3, 15:4, 14:5, 13:6, 12:7, 11:8, 21:9, 22:10, 23:11, 24:12, 25:13, 26:14, 27:15, 28:16,
	55:17, 54:18, 53:19, 52:20, 51:21, 22:61, 23:62, 24:63, 25:64, 26:65,
	27:85, 28:84, 29:83, 30:82, 31:81, 32:71, 33:72, 34:73, 35:74, 36:75,
	 37:48, 38:47, 39:46, 40:45, 41:44, 42:43, 43:42, 44:41, 45:31, 46:32, 47:33, 48:34, 49:35, 50:36, 51:37, 52:38
};
*/
/*=============================================
=            PINTAR EL ODONTOGRAMA GENERAL          =
=============================================*/
var paciente = $('#HistoriaContenido').data('paciente');

$.getJSON(path+'historia/movimiento/getOdontograma', {paciente}, function(json, textStatus) {
	$.each(json, function(index, val) {
		/*----------  Aparato Orto Fijo  ----------*/
		if (val['id_hal'] == 1)
			aparatoOrtoFijo(val['inicio'],val['fin'],val['estado'])
		if (val['id_hal'] == 2)
			aparatoOrtoRemovible(val['inicio'],val['fin'],val['estado'])
		if (val['id_hal'] == 3)
			corona(val['inicio'],val['estado'],val['sigla'])
	});	
});
/*=====  End of PINTAR EL ODONTOGRAMA GENERAL  ======*/


/*============================================
=            PINTAR CADA HALLAZGO            =
============================================*/
function aparatoOrtoFijo($inicio,$fin,$estado){
	var inicio = `<div class="hallazgos aparatoOrtoFijoInicio ${$estado} aparatoOrtoFijoInicio-${$inicio}"></div>`;

	var lineaInicio = parseInt($inicio)+1;
	var lineaFin = parseInt($fin)-1;
	var linea = '';
	for (var i = lineaInicio; i <= lineaFin; i++) {
		linea += `<div class="hallazgos linea ${$estado} linea-${i}"></div>`;
	}

	var fin = `<div class="hallazgos aparatoOrtoFijoFin ${$estado} aparatoOrtoFijoFin-${$fin}"></div>`;

	$('#odontograma-contenido').append(inicio+linea+fin);
}

function aparatoOrtoRemovible($inicio,$fin,$estado){
	var hallazgo = '';
	for (var i = $inicio; i <= $fin; i++) {
		hallazgo += `<div class="hallazgos ${$estado} aparatoOrtoRemovible aparatoOrtoRemovible-${i}"></div>`;
	}
	$('#odontograma-contenido').append(hallazgo);
}

function corona($inicio,$estado,$sigla){
	var hallazgo = `<div class="hallazgos corona ${$estado} corona-${$inicio}"></div>`;
	$('#odontograma-contenido').append(hallazgo);
	var sigla = `<span class="${$estado}">${$sigla},<span>`;
	$('.recuadro-'+$inicio).append(sigla);
}
/*=====  End of PINTAR CADA HALLAZGO  ======*/

});