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
            <h3 class="box-title">Pago</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <a href="<?= base_url('tratamientos/panel') ?>" class=" confirm btn btn-md btn-info btn-fill">
                    <i class="fa fa-long-arrow-left"></i>
                    Volver
                  </a>
                </div>
              </div>
            </div>
            <form id="TratamientosFormPagosCuotas" autocomplete="off" method="POST" action="<?= base_url('tratamientos/panel/pagarCuotaGuardar') ?>">
              <input type="hidden" name="tratamiento" value="<?= $tratamiento->codi_tra ?>">
              <input type="hidden" name="igvValor" value="<?= $parametro->igv ?>">
              <input type="hidden" name="cuota" value="<?= $monto_pago ?>">
              <div class="row">
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="control-label">Documento</label>
                        <select name="documento" class="form-control">
                          <?php foreach ($tipo_documento as $t): ?>
                          <option value="<?= $t->cod_tipodocumento ?>" <?= ($t->descripcion=='BOLETA')?'selected':'' ?>><?= $t->descripcion ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Fecha</label>
                        <input type="text" name="fecha" class="form-control" disabled value="<?= date('Y-m-d') ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Sec. Plan Trat.</label>
                        <input type="text" name="fecha" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="control-label">Serie</label>
                        <input type="text" name="serie" class="form-control" value="" disabled>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="control-label">Secuencia</label>
                        <input type="text" name="secuencia" class="form-control" value="" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Paciente</label>
                        <div class="input-group">
                          <span class="input-group-addon" id="paciente-input-group"><?= $tratamiento->codi_pac ?></span>
                          <input class="form-control" placeholder="Username" aria-describedby="paciente-input-group" value="<?= $tratamiento->nomb_pac.' '.$tratamiento->apel_pac ?>" disabled>
                        </div>
                      </div>
                    </div>
                     <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Dirección</label>
                        <input type="text" class="form-control" value="<?= $tratamiento->dire_pac ?>" disabled>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Médico</label>
                        <input type="text" class="form-control" value="<?= $tratamiento->nomb_med.' '.$tratamiento->apel_med ?>" disabled>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Especialidad</label>
                        <input type="text" class="form-control" value="<?= $tratamiento->nombre_especialidad ?>" disabled>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Asunto</label>
                        <input type="text" name="asunto" class="form-control" value="<?= $tratamiento->asunto_tra ?>" disabled>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Observación</label>
                        <input type="text" class="form-control" value="<?= $tratamiento->observacion_tra ?>" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="control-label">Total Tratamiento</label>
                        <input type="text" name="precio" class="form-control" value="<?= $tratamiento->total_tra ?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="control-label">Sin Descuento</label>
                        <input type="text" name="descuento" class="form-control" value="<?= $sin_descuento ?>" disabled style="text-decoration: line-through;">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="control-label">Condición de Pago</label>
                        <input type="text" class="form-control" value="Cuotas" disabled>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                          <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Procedimientos
                              </a>
                            </h4>
                          </div>
                          <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th width="100">Cantidad</th>
                                    <th>Precio</th>
                                    <th width="100">Dsct%</th>
                                    <th>Total</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($tratamiento->detalle as $t): ?>
                                    
                                  <tr>
                                    <td><?= $t->id_procedimiento ?></td>
                                    <td><?= $t->nombre ?></td>
                                    <td><?= $t->cant_tradet ?></td>
                                    <td><?= $t->preciounit_tradet ?></td>
                                    <td><?= $t->descuento_tradet ?></td>
                                    <td><?= $t->subtotal_tradet ?></td>
                                  </tr>
                                  <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <tr>
                                      <th colspan="5" class="text-right">Total </th>
                                      <th><?= $tratamiento->total_tra ?></th>
                                      <th></th>
                                    </tr>
                                  </tr>
                                </tfoot>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row hidden" id="TratamientoFormPagoCuotas">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Periodicidad</label>
                        <select name="peridiocidad" class="form-control">
                          <option value="Semanal">Semanal</option>
                          <option value="Quincenal">Quincenal</option>
                          <option value="Mensual">Mensual</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">N° de Cuotas</label>
                        <input type="number" name="numCuotas" class="form-control" value="2" min="2">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">1° Fecha de Pago</label>
                        <input type="text" name="fechaCuota" class="form-control" value="<?= date('Y-m-d') ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <button type="button" class="btn btm-md btn-info" id="TratamientoPagosCalcularCuotas" style="margin-top:24px">Calcular Cuotas</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Datos Comprobante - Cuotas</legend>

                        <table id="TablePagoCuotas" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>Marcar</th>
                              <th>N° Cuota</th>
                              <th>Fecha Registro</th>
                              <th>Fecha Vencimiento</th>
                              <th>Monto</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($cuotas as $c): ?>
                            <tr>
                              <td>
                                <?php if ($c->estado_pago==2): ?>
                                <input type="checkbox" disabled checked>
                                <?php else: ?>
                                <input type="checkbox" name="pago[]" value="<?= $c->num_pago ?>">
                                <?php endif ?>
                              </td>
                              <td><?= $c->num_pago ?></td>
                              <td><?= $c->fecharegistro_pago ?></td>
                              <td><?= $c->fechavencimiento_pago ?></td>
                              <td><?= $c->monto_pago ?></td>
                            </tr>
                            <?php endforeach ?>
                          </tbody>
                          <tfoot>
                            <tr>
                              <th colspan="4" class="text-right">Total</th>
                              <th id="TableCuotas-Total"><?= $tratamiento->total_tra ?></th>
                            </tr>
                          </tfoot>
                        </table>
                      </fieldset>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Forma de Pago</legend>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Metodo de Pago</label>
                          <select name="tipoPago" class="form-control">
                            <?php foreach ($tipo_pago as $t): ?>
                            <option value="<?= $t->cod_tipopago ?>" <?= ($t->cod_tipopago==4)?'selected':'' ?>><?= $t->descripcion ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Tipo de Tarjeta</label>
                          <select name="tipoTarjeta" class="form-control" disabled>
                            <option value=""></option>
                            <?php foreach ($tipo_tarjeta as $t): ?>
                            <option value="<?= $t->cod_tarjeta ?>" ><?= $t->descripcion ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Metodo Recibido</label>
                          <input type="text" name="montoRecibido" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Vuelto</label>
                          <input type="text" name="vuelto" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                  </fieldset>

                  <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Total Pago</legend>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Sub-total</label>
                          <input type="text" name="subtotal" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">I.G.V</label>
                          <input type="text" name="IGV" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Total</label>
                          <input type="text" name="total" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Generar</button>
                      </div>
                    </div>
                  </fieldset>
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