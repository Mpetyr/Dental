$(function(){
var seleccionado = '';
$('.odontograma-navegacion a').click(function(event) {
	event.preventDefault();
});

$('.odontograma-item').click(function(event) {
	var hallazgo = $(this).data('hallazgo');
	var estado = $(this).data('estado');
	var sigla = $(this).data('sigla');
	var nombreSeleccion = $(this).parent().parent().parent().find('a')[0].innerText;
	$('#BotonNombreSeleccionado').show().html(nombreSeleccion);
	$('#BotonSeleccion').removeClass('btn-default').addClass('btn-info').html('Quitar Selección');
});

$('#BotonSeleccion').click(function(event) {
	$(this).html('Seleccione');
	$('#BotonNombreSeleccionado').hide();
	seleccionado = '';
});

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




});