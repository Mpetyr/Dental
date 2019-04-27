<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<div id="HistoriaContenidoPlacas" class="panel panel-primary">
  <div class="panel-heading">Examenes Auxiliares - Placas</div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <button class="btn btn-success" data-toggle="modal" data-target="#ModalAgregarPlaca">Agregar</button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table id="TableHistoriaMovimientoPlacas" class="table table-bordered">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Nombre</th>
              <th>Notas</th>
              <th>Archivo</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<div id="ModalAgregarPlaca" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content ">
      <form id="FormHistoriaMovimientoAgregarPlaca" action="<?= base_url('historia/movimiento/agregarPlaca') ?>" method="post" autocomplete="off">
        <input type="hidden" name="paciente" value="<?= $this->uri->segment(4) ?>">
        <input type="hidden" name="archivo">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Placa</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input id="placaArchivo" type="file" name="placaArchivo" />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="control-label">Nombre de la Placa</label>
                <input type="text" name="nombre" class="form-control">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="control-label">Notas</label>
                <textarea name="notas" class="form-control" rows="5"></textarea>
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

