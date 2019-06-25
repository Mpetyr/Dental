<div class="w100">
	<div class="w30">
		<img src="<?= base_url('assets/uploads/logo/logogeneral.png') ?>">
	</div>
	<div class="w40 text-center">
		<h5>CLINICA DENTAL <br><?= $clinicas->nomb_clin ?></h5>
		<p>
			Dirección: San Alegría N° 1 <br>
			Email: vidaldent@gmail.com
		</p>
	</div>
	<div class="w30">
		<br>
		<br>
		<br>
		<div class="w100">
			Reporte <?= date('Y/m/d',strtotime($_GET['desde'])) ?> - <?= date('Y/m/d',strtotime($_GET['hasta'])) ?> <br>
			<?php $_GET['estado'] ?>
		</div>
	</div>
</div>