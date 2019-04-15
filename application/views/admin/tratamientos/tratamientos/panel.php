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
            <h3 class="box-title">Listado</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <label class="control-label">Busqueda por fecha</label>
              </div>
            </div>
            <form id="TratamientosFormBusqueda" target="_blank" action="<?= base_url('tratamientos/panel/imprimirListadoTratamientos') ?>" autocomplete="off" method="off">
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="control-label">Desde</label>
                    <input type="text" name="desde" class="form-control datepicker" value="<?= date('Y-m-d') ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="control-label">Hasta</label>
                    <input type="text" name="hasta" class="form-control datepicker" value="<?= date('Y-m-d') ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="control-label">Estado</label>
                    <select name="estado" class="form-control">
                      <option value="Activo">Activo</option>
                      <option value="Anulado">Anulado</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="control-label">Busqueda por Paciente</label>
                    <input type="text" name="paciente" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <button type="submit" style="margin-top:24px" class="btn btn-success btn-md"><i class="fa fa-search"></i> Buscar</button>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <a target="_blank" id="TratamientosImprimirLista" class="btn btn-info btn-md"><i class="fa fa-print"></i> Imprimir Lista</a>
                  <a href="<?= base_url('tratamientos/panel/nuevo') ?>" class="btn btn-info btn-md right">Agregar Tratamiento</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="">
                  <table id="TableTratamientosPanel" class="table table-bordered table-condensed table-hover">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Secuencia</th>
                        <th>Paciente</th>
                        <th>Asunto</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Cond. Pago</th>
                        <th>Estado</th>
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

