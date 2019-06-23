$(function(){
var seleccionado = '';
$('.odontograma-navegacion a').click(function(event) {
	event.preventDefault();
});

/*=================================================
=            SELECCIONANDO EL HALLAZGO            =
=================================================*/
$('.odontograma-item').click(function(event) {
	var t = $(this);
	if (t.hasClass('nombreHallazgo')) {
		var seleccionado = t[0];
	}else{
		var seleccionado = t.parent().parent().parent().find('a.nombreHallazgo')[0];
	}
	var hallazgo = $(seleccionado).data('hallazgo');
	var sigla = $(seleccionado).data('sigla');
	var estado = $(this).data('estado');
	$('#FormHistoriaMovimientoAgregarHallazgo input[name=hallazgo], #FormHistoriaMovimientoAgregarHallazgo input[name=estado], #FormHistoriaMovimientoAgregarHallazgo input[name=sigla], #FormHistoriaMovimientoAgregarHallazgo input[name=diente], #FormHistoriaMovimientoAgregarHallazgo input[name=dienteFinal]').val('');

	$('#colDienteFinal').hide();
	$('.cursor').removeClass('inicioSelec');

	$('#BotonNombreSeleccionado').show().html(seleccionado.innerText);

	$('#odontograma-contenido').removeClass('detalle unico inicio fin');
	if ($(seleccionado).hasClass('rango')) {
		$('#odontograma-contenido').addClass('inicio');
	}else{
		$('#odontograma-contenido').addClass('unico');
	}

	$('#modalHallazgo').val(seleccionado.innerText);

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
	$('#odontograma-contenido').removeClass('unico inicio fin').addClass('detalle');
	$('.cursor').removeClass('inicioSelec');
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
	$(this).addClass('inicioSelec');
	var diente = $(this).data('diente');

	$('#FormHistoriaMovimientoAgregarHallazgo input[name="diente"]').val(diente);
});

$('#odontograma').on('click', '#odontograma-contenido.fin>.cursor', function(event) {
	event.preventDefault();
	var inicio = parseInt($('#odontograma-contenido .inicioSelec').data('orden'));
	var fin = parseInt($(this).data('orden'));

	if (fin<inicio) {
		Swal.fire({
			title: "Error",
			html: "El diente final se debe seleccionar hacia la parte derecha <span class='fa fa-arrow-right'></span>",
			type: "error",
		});
		return;
	}
	var diente = $(this).data('diente');

	$('#FormHistoriaMovimientoAgregarHallazgo input[name="dienteFinal"]').val(diente);
	$('#colDienteFinal').show();
	$('#ModalAgregarHallazgo').modal();
});
/*=====  End of SELECCIONANDO EL DIENTE  ======*/

/*=========================================
=            DETALLE DE DIENTE            =
=========================================*/
$('#odontograma').on('click', '#odontograma-contenido.detalle>.cursor', function(event) {
	event.preventDefault();
	$('#ModalOdontogramaDetalle table>tbody').html('');
	var diente = $(this).data('diente');
	var paciente = $('#HistoriaContenido').data('paciente');
	$('#ModalOdontogramaDetalle').modal();
	$.getJSON(path+'historia/movimiento/getHallazgosDientePaciente', {paciente,diente}, function(json, textStatus) {
			var hallazgos = '';
			$.each(json, function(index, val) {
				var estado = '';
				if (val['estado']!= null) {
					if (val['estado']=='bueno') {
						estado = 'Buen Estado';
					}else{
						estado = 'Mal Estado';
					}
				}
				hallazgos += `
					<tr>
						<td>${(val['sigla']!=null)?'<b>'+val['sigla']+':</b>':''} ${val['nombre_hal']}</td>
						<td>${ val['dienteInicio'] }</td>
						<td>${ (val['dienteFinal']!=null)?val['dienteFinal']:'' }</td>
						<td>${ estado }</td>
						<td>${ val['especificaciones'] }</td>
						<td><button data-id='${ val['pacodo_id'] }'' class="eliminar-hallazgo btn btn-xs btn-danger btn-fill"><i class="fa fa-trash"></i></button></td>
					<tr>
				`;
			});
			$('#ModalOdontogramaDetalle table>tbody').html(hallazgos);
	});
});

$('#ModalOdontogramaDetalle table>tbody').on('click', '.eliminar-hallazgo', function(event) {
	event.preventDefault();
	var fila = $(this).parent().parent();
	var id = $(this).data('id');
	var paciente = $('#HistoriaContenido').data('paciente');

	Swal.fire({
		title: "Confirmar Eliminar",
		type: "warning",
		cancelButtonText:'No, Cancelar',
		confirmButtonText:'Si, Eliminar',
		showCancelButton: true,
		confirmButtonColor: "#007AFF",
		cancelButtonColor: "#d43f3a",
		text: '¿Estas seguro de eliminar el hallazgo?'
	}).then((result) => {
		if (result.value) {
			$.getJSON(path+'historia/movimiento/eliminarHallazgo', {id,paciente}, function(json, textStatus) {
					if (json.success) {
						fila.remove();
						$('#odontograma-contenido .hallazgo-'+id).remove();
						Swal.fire({
							title: "Buen trabajo",
							text: "La solicitud ha sido procesada.",
							type: "success"
						});
					}else{
						Swal.fire({
							title: "Error",
							text: "Ha ocurrido un error.",
							type: "error"
						});
					}
			});
			
		}
	})



});
/*=====  End of DETALLE DE DIENTE  ======*/


/*========================================
=            AGREGAR HALLAZGO            =
========================================*/
$('#FormHistoriaMovimientoAgregarHallazgo').validate({
	ignore: [],
	rules: {
		diente:{required:true},
	},
	submitHandler:function() {
		enviarFormulario('#FormHistoriaMovimientoAgregarHallazgo',function(resp){
			if (resp.success) {
				pintarHallazgos(resp.data);
				$('#ModalAgregarHallazgo').modal('hide');
				$('#FormHistoriaMovimientoAgregarHallazgo textarea[name=especificaciones]').val('');
				$('#BotonSeleccion').trigger('click');
			}
		});
	}
});
/*=====  End of AGREGAR HALLAZGO  ======*/


/*=================================================
=            PINTAR ODONTOGRAMA ACTUAL            =
=================================================*/
var paciente = $('#HistoriaContenido').data('paciente');
$.getJSON(path+'historia/movimiento/getOdontograma', {paciente}, function(json, textStatus) {
	$.each(json, function(index, val) {
		pintarHallazgos(val);
	});	
});
/*=====  End of PINTAR ODONTOGRAMA ACTUAL  ======*/

/*========================================
=            PINTAR HALLAZGOS            =
========================================*/
function pintarHallazgos(val){
	if (val['id_hal'] == 1)
		aparatoOrtoFijo(val['id'],val['inicio'],val['fin'],val['estado'])
	if (val['id_hal'] == 2)
		aparatoOrtoRemovible(val['id'],val['inicio'],val['fin'],val['estado'])
	if (val['id_hal'] == 3)
		corona(val['id'],val['inicio'],val['estado'],val['sigla'])
	if (val['id_hal'] == 37)
		coronaTemporal(val['id'],val['inicio'],val['estado'],val['sigla'])
	if (val['id_hal'] == 5)
		defectosDesarrolloEsmalte(val['id'],val['inicio'],val['estado'],val['sigla'])
	if (val['id_hal'] == 17)
		diastema(val['id'],val['inicio'])
	if (val['id_hal'] == 9)
		piezaAusente(val['id'],val['inicio'])
	if (val['id_hal'] == 21)
		piezaEctopica(val['id'],val['inicio'],val['sigla'])
	if (val['id_hal'] == 20)
		piezaClavija(val['id'],val['inicio'])
	if (val['id_hal'] == 10)
		piezaErupcion(val['id'],val['inicio'])
	if (val['id_hal'] == 15)
		piezaExtruida(val['id'],val['inicio'])
	if (val['id_hal'] == 16)
		piezaIntruida(val['id'],val['inicio'])
	if (val['id_hal'] == 13)
		edentuloTotal(val['id'],val['inicio'],val['fin'])

	console.log(val);
	
}
/*=====  End of PINTAR HALLAZGOS  ======*/



/*============================================
=            PINTAR CADA HALLAZGO            =
============================================*/
function edentuloTotal($id,$inicio,$fin){
	var hallazgo = '';
	for (var i = parseInt($inicio); i <= parseInt($fin); i++) {
		hallazgo += `<div class="hallazgos hallazgo-${$id}  edentulo edentulo-${i}"></div>`;
	}
	$('#odontograma-contenido').append(hallazgo);
}

function piezaIntruida($id,$inicio){
	var hallazgo = `<div class="hallazgos hallazgo-${$id} piezaIntruida piezaIntruida-${$inicio}"></div>`;
	$('#odontograma-contenido').append(hallazgo);
}

function piezaExtruida($id,$inicio){
	var hallazgo = `<div class="hallazgos hallazgo-${$id} piezaExtruida piezaExtruida-${$inicio}"></div>`;
	$('#odontograma-contenido').append(hallazgo);
}

function piezaErupcion($id,$inicio){
	var hallazgo = `<div class="hallazgos hallazgo-${$id} erupcion erupcion-${$inicio}"></div>`;
	$('#odontograma-contenido').append(hallazgo);
}

function piezaClavija($id,$inicio){
	var hallazgo = `<div class="hallazgos hallazgo-${$id} piezaClavija piezaClavija-${$inicio}"></div>`;
	$('#odontograma-contenido').append(hallazgo);
}

function piezaEctopica($id,$inicio,$sigla){
	var sigla = `<span class="hallazgo-${$id}">${$sigla},<span>`;
	$('.recuadro-'+$inicio).append(sigla);
}

function piezaAusente($id,$inicio){
	var hallazgo = `<div class="hallazgos hallazgo-${$id} piezaAusente piezaAusente-${$inicio}"></div>`;
	$('#odontograma-contenido').append(hallazgo);
}

function diastema($id,$inicio){
	var hallazgo = `<div class="hallazgos hallazgo-${$id} diastema diastema-${$inicio}"></div>`;
	$('#odontograma-contenido').append(hallazgo);
}

function defectosDesarrolloEsmalte($id,$inicio,$estado,$sigla){
	var sigla = `<span class="${$estado} hallazgo-${$id}">${$sigla},<span>`;
	$('.recuadro-'+$inicio).append(sigla);
}

function aparatoOrtoFijo($id,$inicio,$fin,$estado){
	var inicio = `<div class="hallazgos hallazgo-${$id} aparatoOrtoFijoInicio ${$estado} aparatoOrtoFijoInicio-${$inicio}"></div>`;

	var lineaInicio = parseInt($inicio)+1;
	var lineaFin = parseInt($fin)-1;
	var linea = '';
	for (var i = lineaInicio; i <= lineaFin; i++) {
		linea += `<div class="hallazgos hallazgo-${$id} linea ${$estado} linea-${i}"></div>`;
	}

	var fin = `<div class="hallazgos hallazgo-${$id} aparatoOrtoFijoFin ${$estado} aparatoOrtoFijoFin-${$fin}"></div>`;

	$('#odontograma-contenido').append(inicio+linea+fin);
}

function aparatoOrtoRemovible($id,$inicio,$fin,$estado){
	var hallazgo = '';
	for (var i = parseInt($inicio); i <= parseInt($fin); i++) {
		hallazgo += `<div class="hallazgos hallazgo-${$id} ${$estado} aparatoOrtoRemovible aparatoOrtoRemovible-${i}"></div>`;
	}
	$('#odontograma-contenido').append(hallazgo);
}

function corona($id,$inicio,$estado,$sigla){
	var hallazgo = `<div class="hallazgos hallazgo-${$id} corona ${$estado} corona-${$inicio}"></div>`;
	$('#odontograma-contenido').append(hallazgo);
	var sigla = `<span class="${$estado} hallazgo-${$id}">${$sigla},<span>`;
	$('.recuadro-'+$inicio).append(sigla);
}

function coronaTemporal($id,$inicio,$estado,$sigla)
{
	var hallazgo = `<div class="hallazgos hallazgo-${$id} coronaTemporal ${$estado} coronaTemporal-${$inicio}"></div>`;
	$('#odontograma-contenido').append(hallazgo);
	var sigla = `<span class="${$estado} hallazgo-${$id}">${$sigla},<span>`;
	$('.recuadro-'+$inicio).append(sigla);
}
/*=====  End of PINTAR CADA HALLAZGO  ======*/


/*============================================
=            IMPRIMIR ODONTOGRAMA            =
============================================*/

$('.imprimirOdontograma li').click(function(event) {
	var tipo = $(this).data('tipo');
	html2canvas($("#odontograma"), {
	 	background :'#FFFFFF', 
		onrendered: function(canvas) {
			var imgData = canvas.toDataURL('image/jpeg');
			imgData = imgData.replace("data:image/jpeg;base64,","");			
			var imagen = `<img src="data:image/png;base64, ${imgData}" alt="Red dot" style="width:100%" />`;
			
			$('#imprimir').html(imagen);
			/*$.ajax({
				url: path+'historia/movimiento/imprimirOdontograma',
				type: 'POST',
				dataType: 'JSON',
				data: {imgData,tipo},
			})
			.done(function(res) {
				console.log("success");
			})*/
			
		}
	});
});
/*=====  End of IMPRIMIR ODONTOGRAMA  ======*/


});