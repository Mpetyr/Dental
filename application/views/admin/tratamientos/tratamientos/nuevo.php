<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Tratamientos</h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">NUEVO PLAN DE TRATAMIENTO</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <a href="<?= base_url('tratamientos/panel') ?>" class="btn btn-md btn-info btn-fill">
                    <i class="fa fa-long-arrow-left"></i>
                    Volver
                  </a>
                </div>
              </div>
            </div>
            <form id="TratamientosFormNuevo" autocomplete="off" method="POST" action="<?= base_url('tratamientos/panel/guardarTratamiento') ?>">
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="control-label">Fecha</label>
                    <input type="text" class="form-control" value="<?= date('Y-m-d') ?>" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Especialidad</label>
                    <select name="especialidad" class="form-control">
                      <option value="">Seleccione</option>
                      <?php foreach ($especialidades as $e): ?>
                      <option value="<?= $e->cod_especialidad ?>"><?= $e->nombre_especialidad ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Médico</label>
                    <select name="medico" class="form-control">
                      <option value="">Seleccione</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Paciente</label>
                    <select name="paciente" class="form-control">
                      <option value="">Seleccione</option>
                      <?php foreach ($pacientes as $p): ?>
                      <option value="<?= $p->codi_pac ?>"><?= $p->apel_pac.' '.$p->nomb_pac ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Asunto</label>
                    <input type="text" name="asunto" class="form-control" placeholder="Asunto">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Obsevación</label>
                    <input type="text" name="observacion" class="form-control" placeholder="Observación">
                  </div>
                </div>
              </div>
              <hr>
              <h4>Procedimientos</h4>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <button type="button" class="pull-right btn btn-md btn-info" id="TratamientoAgregarProcedimiento"><i class="fa fa-plus"></i> Agregar</button>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <table id="TableTratamientoProcedimiento" class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th width="100">Cantidad</th>
                        <th>Precio</th>
                        <th width="100">Dsct%</th>
                        <th>Total</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="TratamientoBodyProcedimiento">
                    </tbody>
                    <tfoot class="hidden">
                      <tr>
                        <tr>
                          <th colspan="5" class="text-right">Total </th>
                          <th></th>
                          <th></th>
                        </tr>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-success btn-md btn-fill"><i class="fa fa-save"></i> Guardar</button>
                </div>
              </div>
            </form>
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


<div id="ModalTratamientoProcedimientos" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">PROCEDIMIENTOS</h4>
      </div>
      <div class="modal-body">
        <table id="TableTratamientoProcedimientosModal" class="table table-bordered">
          <thead>
            <tr>
              <th>Código</th>
              <th>Procedimiento</th>
              <th width="100">Cant.</th>
              <th>Precio</th>
              <th width="70"></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Código</th>
              <th>Procedimiento</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach ($procedimientos as $p): ?>
          <tr>
            <td><?= $p->id_procedimiento ?></td>
            <td><?= $p->nombre ?></td>
            <td><input id="proc-cant-<?= $p->id_procedimiento ?>" type="number" name="cant" class="form-control" value="1"></td>
            <td><?= $p->prec_procedimiento ?></td>
            <td><button data-id="<?= $p->id_procedimiento ?>" class="addProcedimiento btn btn-ico btn-info"><i class="fa fa-plus"></i></button></td>
          </tr>
          <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

