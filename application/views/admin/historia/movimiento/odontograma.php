<div id="HistoriaContenidoOdontograma" class="panel panel-primary">
  <div class="panel-heading">
    <span class="glyphicon glyphicon-list"></span> Odontograma
    <div class="pull-right action-buttons">
      <div class="btn-group pull-right">
        <button type="button" class="btn btn-default btn-xs dropdown-print" data-toggle="dropdown">
          <span class="glyphicon glyphicon-print" style="margin-right: 0px;"></span>
        </button>
        <ul class="dropdown-menu slidedown">
          <li><a href="#"><i class="fa fa-print" aria-hidden="true"></i>Odontograma inicial</a></li>
          <li><a href="#"><i class="fa fa-print" aria-hidden="true"></i></span>Odontograma evolucionado</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="panel-body">
    <div id="odontograma">
      <div id="odontograma-contenido">
        <img src="<?= base_url('assets/odontograma/plantilla.jpg') ?>" width="600">
        <?php $this->load->view('admin/historia/movimiento/odontograma/cursores.php') ?>
      </div>
    </div>
  </div>
</div>

