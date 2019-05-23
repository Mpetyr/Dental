<div id="HistoriaContenidoOdontograma" class="panel panel-primary">
  <div class="panel-heading">
    <span class="glyphicon glyphicon-list"></span> Odontograma
    <div class="pull-right action-buttons">
      <div class="btn-group pull-right">
        <button type="button" class="btn btn-default btn-xs" data-toggle="dropdown">
          <span class="fa fa-bars" style="margin-right: 0px;"></span>
        </button>
        <ul class="dropdown-menu slidedown">
          <li><a href="#">Odontograma inicial</a></li>
          <li><a href="#">Odontograma evolucionado</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="panel-body">
    <div id="odontograma">
      <div id="odontograma-contenido">
        <img src="<?= base_url('assets/odontograma/images/plantilla_nuevo05.png') ?>" class="img-responsive">
        <?php $this->load->view('admin/historia/movimiento/odontograma/cursores.php') ?>
      </div>
    </div>
  </div>
</div>

<div id="ModalAgregarHallazgo" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content ">
      <form id="FormHistoriaMovimientoAgregarHallazgo" action="<?= base_url('historia/movimiento/agregarHallazgo') ?>" method="post" autocomplete="off">
        <input type="hidden" name="hallazgo">
        <input type="hidden" name="estado">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Hallazgo</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Hallazgo</label>
                <input type="text" id="modalHallazgo" class="form-control" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label">N° de Diente</label>
                <input type="text" name="diente" class="form-control" readonly>
              </div>
            </div>
            <div class="col-md-3" id="colEstado">
              <div class="form-group">
                <label class="control-label">Estado</label>
                <input type="text" id="modalEstado" class="form-control" readonly>
              </div>
            </div>
            <div class="col-md-3" id="colSigla">
              <div class="form-group">
                <label class="control-label">Sigla</label>
                <input type="text" name="sigla" class="form-control" readonly>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="control-label">Especificaciones</label>
                <textarea name="especificaciones" class="form-control" rows="5"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
          <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Guardar</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->