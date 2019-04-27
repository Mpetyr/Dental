<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Movimientos</h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <!-- <div class="box-header">
            <h3 class="box-title"><?= $paciente->nomb_pac.' '.$paciente->apel_pac ?></h3>
          </div> -->
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-9">
                <div id="HistoriaContenido" data-paciente="<?= $this->uri->segment(4) ?>">
                  <?php
                    $this->load->view('admin/historia/movimiento/datos_paciente');
                    $this->load->view('admin/historia/movimiento/exploracion_fisica');
                    $this->load->view('admin/historia/movimiento/receta');
                    $this->load->view('admin/historia/movimiento/placas');
                  ?>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center">
                  <img src="<?= base_url('assets/img/avatar04.png') ?>" class="img-circle">
                  <h4>H.C: <?= $paciente->codi_pac ?></h4>
                  <h5><?= $paciente->nomb_pac.' '.$paciente->apel_pac ?></h5>
                </div>
                <div id="HistoriaMenu" class="list-group">

                  <a href="#" data-id="HistoriaContenidoDatosPaciente" class="list-group-item active"><i class="fa fa-user" aria-hidden="true"></i> Datos del Paciente</a>
                  <a href="#" data-id="HistoriaContenidoExploracionFisica" class="list-group-item"><i class="fa fa-file-text-o" aria-hidden="true"></i> Exploración física paciente</a>
                  <a href="#" class="list-group-item"><i class="fa fa-life-ring" aria-hidden="true"></i> Odontograma</a>
                  <a href="#" class="list-group-item"> <i class="fa fa-heart" aria-hidden="true"></i> Diagnostico</a>
                  <a href="#" class="list-group-item">Evolución</a>
                  <a href="#" data-id="HistoriaContenidoPlacas" class="list-group-item active">Examenes Auxiliares - Placas</a>
                  <a href="#" class="list-group-item">Tratamientos realizados</a>
                  <a href="#" data-id="HistoriaContenidoReceta" class="list-group-item">Receta</a>
                  <a href="#" class="list-group-item">Citas</a>
                  <a href="#" class="list-group-item"><i class="fa fa-user-md" aria-hidden="true"></i> Evolución</a>
                  <a href="#" class="list-group-item"><i class="fa fa-files-o" aria-hidden="true"></i> Exam. Auxiliares Placas</a>
                  <a href="#" class="list-group-item"><i class="fa fa-credit-card" aria-hidden="true"></i> Tratamientos realizados</a>
                  <a href="#" class="list-group-item"><i class="fa fa-medkit" aria-hidden="true"></i> Receta</a>
                  <a href="#" class="list-group-item"><i class="fa fa-calendar-plus-o"></i> Citas</a>

                </div>
              </div>
            </div>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

