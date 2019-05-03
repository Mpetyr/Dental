<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Historia clinica</h1>
    <ol class="breadcrumb">
       <div style="float:right;">
                                <div class="dropdown open">
                                    <div class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="padding:0px 8px;" aria-expanded="true">
                                        <i class="fa fa-cog fa-2" aria-hidden="true" style="font-size: 22px;"></i>
                                    </div>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#" onclick="openModal_ImprimirPDF();" data-original-title="" title=""><i class="fa fa-print fa-1" aria-hidden="true"></i> Imprimir Historia</a></li>
                                       <!--  <li><a href="#" onclick="openModal_ImprimirPDF_OdonInicial();" data-original-title="" title=""><i class="fa fa-print fa-1" aria-hidden="true"></i>  Imprimir Odontograma - Inicial</a></li>
                                        <li><a href="#" onclick="openModal_ImprimirPDF_OdonEvolucion();" data-original-title="" title=""><i class="fa fa-print fa-1" aria-hidden="true"></i>  Imprimir Odontograma - Evolucion</a></li> -->
                        
                                    </ul>
                                </div>
      </ol>
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
                    $this->load->view('admin/historia/movimiento/Odontograma');
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
                  <a href="#" data-id="HistoriaContenidoExploracionFisica" class="list-group-item"><i class="fa fa-file-text-o" aria-hidden="true"></i>   Exploración Física</a>
                  <a href="#" data-id="HistoriaContenidoOdontograma" class="list-group-item"><i class="fa fa-life-ring" aria-hidden="true"></i>  Odontograma</a>
                  <a href="#" class="list-group-item"><i class="fa fa-heart" aria-hidden="true"></i>  Diagnostico</a>
                  <a href="#" class="list-group-item"><i class="fa fa-user-md" aria-hidden="true"></i> Evolución</a>
                  <a href="#" data-id="HistoriaContenidoPlacas" class="list-group-item"><i class="fa fa-files-o" data-id="HistoriaContenidoReceta" aria-hidden="true"></i> Exam. Auxiliares Placas</a>
                  <a href="#" class="list-group-item"><i class="fa fa-credit-card" aria-hidden="true"></i> Tratamientos realizados</a>
                  <a href="#" data-id="HistoriaContenidoReceta" class="list-group-item"><i class="fa fa-medkit" aria-hidden="true"></i> Receta</a>
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

