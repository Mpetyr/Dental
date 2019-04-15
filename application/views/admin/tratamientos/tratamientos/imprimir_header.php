<div class="w100">
	<div class="w30">
		<img src="<?= base_url('assets/img/logo_dental.png') ?>">
	</div>
	<div class="w40 text-center">
		<h5>VIDAL DENT <br>CLÍNICA DENTAL</h5>
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