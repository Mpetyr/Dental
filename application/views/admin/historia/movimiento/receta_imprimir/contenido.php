<p style="font-size: 12px">
	Paciente: <?= $receta->nomb_pac.' '.$receta->apel_pac ?> <br>
	Edad: <?= edad($receta->fena_pac) ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Peso: <?= $receta->peso_exp ?> Kg
</p>


<div style="font-size: 12px">
	<div class="w50">
		<div style="padding: 5px">
			<label><strong style="font-size: 13px">Receta</strong></label>
			<div style="border:2px solid #337ab7; padding:3px" height="250">
				<?= $receta->pacrec_receta ?>
			</div>
		</div>
	</div>
	<div class="w50">
		<div style="padding: 5px">
			<label><strong style="font-size: 13px">Indicaciones</strong></label>
			<div style="border:2px solid #337ab7; padding:3px" height="250">
				<?= $receta->pacrec_indicaciones ?>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div style="font-size: 12px">
	<div class="w50">
		Fecha: <?= $receta->pacrec_fecha ?>
	</div>
	<div class="w50">
		<div class="text-center" style="margin:0 auto; border-top: 1px solid black;width:200px">
			Firma y Sello
		</div>
	</div>
</div>

<br>
<br>
<div>
	<p style="padding:4px;font-size:14px;background-color:green;color:white; text-align: center">
		ATENCIÓN: DE LUNES A SABADO DE 9:00 A.M - 9:00 P.M - DOMINGOS PREVIA CITA<br>
		CORREO: <?= $clinicas->email_clin ?>
	</p>
</div>
</div>