<p style="font-size: 12px">
	Paciente: <?= $receta->nomb_pac.' '.$receta->apel_pac ?> <br>
	Edad: <?= edad($receta->fena_pac) ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Peso: <?= $receta->peso_exp ?> Kg
</p>


<div style="font-size: 12px">
	<div class="w50">
		<div style="padding: 5px">
			<label><strong style="font-size: 13px">Receta</strong></label>
			<div style="border:2px solid #337ab7; padding:3px" height="400">
				<?= $receta->pacrec_receta ?>
			</div>
		</div>
	</div>
	<div class="w50">
		<div style="padding: 5px">
			<label><strong style="font-size: 13px">Indicaciones</strong></label>
			<div style="border:2px solid #337ab7; padding:3px" height="400">
				<?= $receta->pacrec_indicaciones ?>
			</div>
		</div>
	</div>
</div>