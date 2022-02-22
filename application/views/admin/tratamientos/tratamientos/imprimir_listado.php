<?php foreach ($tratamientos as $t): ?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th style="background: #222d32;color:white; font-size: 14px;">Código</th>
			<th style="background: #222d32;color:white; font-size: 14px;">Fecha</th>
			<th style="background: #222d32;color:white; font-size: 14px;">Paciente</th>
			<th style="background: #222d32;color:white; font-size: 14px;">Medico</th>
			<th style="background: #222d32;color:white; font-size: 14px;">Asunto</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="font-size: 14px;"><?= $t->codi_tra ?></td>
			<td style="font-size: 14px;"><?= $t->fecha_tra ?></td>
			<td style="font-size: 14px;"><?= $t->NombresApellidos ?></td>
			<td style="font-size: 14px;"><?= $t->nomb_med.' '.$t->apel_med.' - '.$t->nombre_especialidad ?></td>
			<td style="font-size: 14px;"><?= $t->asunto_tra ?></td>
		</tr>
	</tbody>
		<tr>
			<th style="background: #3c8dbc;color:white; font-size: 14px;">Procedimiento</th>
			<th style="background: #3c8dbc;color:white; font-size: 14px;">Cantidad</th>
			<th style="background: #3c8dbc;color:white; font-size: 14px;">Precio</th>
			<th style="background: #3c8dbc;color:white; font-size: 14px;">Descuento</th>
			<th style="background: #3c8dbc;color:white; font-size: 14px;">Subtotal</th>
		</tr>
		<?php foreach ($t->procedimientos as $p): ?>
		<tr>
			<td style="font-size: 14px;"><?= $p->nombre ?></td>
			<td style="font-size: 14px;"><?= $p->cant_tradet ?></td>
			<td style="font-size: 14px;"><?= $p->preciounit_tradet ?></td>
			<td style="font-size: 14px;"><?= $p->descuento_tradet ?>%</td>
			<td style="font-size: 14px;"><?= $p->subtotal_tradet ?></td>
		</tr>
		<?php endforeach ?>
		<tr>
			<th colspan="3"></th>
			<th style="background: #222d32;color:white;text-align:right; font-size:16px">Total</th>
			<th style="font-size:16px"><?= $t->total_tra ?></th>
		</tr>
</table>

<?php endforeach ?>