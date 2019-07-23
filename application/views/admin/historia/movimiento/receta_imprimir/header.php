<div class="w100">
		<div class="w30">
		<img src="<?= base_url('assets/uploads/logo/'.$this->session->userdata('foto')) ?>" style="max-width: 80px:">
	</div>
	<div class="w40">
		<p class="text-center" style="color:green" width="200">
			<span style="font-size: 16px"><strong>CLINICA DENTAL</strong></span><br>
			<span style="font-size: 18px"><strong><?= $clinicas->nomb_clin ?></strong></span><br>
		
		</p>
	</div>
	<div class="w30" >
		<p  class="text-center" style="font-size: 10px;padding-left: 20px" >
			<?= $clinicas->direc_clin ?><br>
			
			Telefono: <?= $clinicas->telf_clin ?><br>
			Correo: <?= $clinicas->email_clin ?>
		</p>
	</div>
<hr>
</div>