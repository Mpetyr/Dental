<div id="HistoriaContenidoReceta" class="panel panel-primary" style="display: none">
  <div class="panel-heading">Receta</div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <button class="btn btn-success" data-toggle="modal" data-target="#ModalAgregarReceta">Agregar</button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table id="TableHistoriaMovimientoRecetas" class="table table-bordered">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Asunto</th>
              <th>Médico</th>
              <th>Diagnostico</th>
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


<div id="ModalAgregarReceta" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <form id="FormHistoriaMovimientoAgregarReceta" action="<?= base_url('historia/movimiento/agregarReceta') ?>" method="post" autocomplete="off">
        <input type="hidden" name="paciente" value="<?= $this->uri->segment(4) ?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Receta</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">N° H.C <?= $this->uri->segment(4) ?></label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Edad <?= edad($paciente->fena_pac) ?></label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Fecha</label>
                    <input type="text" name="fecha" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Hora</label>
                    <input type="text" name="hora" class="form-control" value="<?= date('H:i:s') ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Asunto</label>
                    <input type="text" name="asunto" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Receta</label>
                    <textarea name="receta" class="form-control" rows="5"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Medico</label>
                    <input type="text" name="medico" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Diagnostico 01</label>
                    <select name="diagnostico01" class="form-control select2" style="width: 100%">
                      <option value=""></option>
                      <?php foreach ($diagnosticos as $d): ?>
                      <option value="<?= $d->codi_enf ?>"><?= $d->desc_enf ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Diagnostico 02</label>
                    <select name="diagnostico02" class="form-control select2" style="width: 100%">
                      <option value=""></option>
                      <?php foreach ($diagnosticos as $d): ?>
                      <option value="<?= $d->codi_enf ?>"><?= $d->desc_enf ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Diagnostico 03</label>
                    <select name="diagnostico03" class="form-control select2" style="width: 100%">
                      <option value=""></option>
                      <?php foreach ($diagnosticos as $d): ?>
                      <option value="<?= $d->codi_enf ?>"><?= $d->desc_enf ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Indicaciones</label>
                    <textarea name="indicaciones" class="form-control" rows="5"></textarea>
                  </div>
                </div>
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


<div id="ModalEditarReceta" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <form id="FormHistoriaMovimientoEditarReceta" action="<?= base_url('historia/movimiento/editarReceta') ?>" method="post" autocomplete="off">
        <input type="hidden" name="paciente" value="<?= $this->uri->segment(4) ?>">
        <input type="hidden" name="id" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Editar Receta</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">N° H.C <?= $this->uri->segment(4) ?></label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Edad <?= edad($paciente->fena_pac) ?></label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Fecha</label>
                    <input type="text" name="fecha" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Hora</label>
                    <input type="text" name="hora" class="form-control" value="<?= date('H:i:s') ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Asunto</label>
                    <input type="text" name="asunto" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Receta</label>
                    <textarea name="receta" class="form-control" rows="5"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Medico</label>
                    <input type="text" name="medico" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Diagnostico 01</label>
                    <select name="diagnostico01" class="form-control select2" style="width: 100%">
                      <option value=""></option>
                      <?php foreach ($diagnosticos as $d): ?>
                      <option value="<?= $d->codi_enf ?>"><?= $d->desc_enf ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Diagnostico 02</label>
                    <select name="diagnostico02" class="form-control select2" style="width: 100%">
                      <option value=""></option>
                      <?php foreach ($diagnosticos as $d): ?>
                      <option value="<?= $d->codi_enf ?>"><?= $d->desc_enf ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Diagnostico 03</label>
                    <select name="diagnostico03" class="form-control select2" style="width: 100%">
                      <option value=""></option>
                      <?php foreach ($diagnosticos as $d): ?>
                      <option value="<?= $d->codi_enf ?>"><?= $d->desc_enf ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Indicaciones</label>
                    <textarea name="indicaciones" class="form-control" rows="5"></textarea>
                  </div>
                </div>
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
