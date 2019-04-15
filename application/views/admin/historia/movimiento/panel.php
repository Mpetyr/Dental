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
            <form id="HistoriaMovimientoBusqueda" action="" autocomplete="off">
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
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="control-label">Nombres Apellidos</label>
                    <input type="text" name="nombresApellidos" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <button type="submit" style="margin-top:24px" class="btn btn-success btn-md"><i class="fa fa-search"></i> Buscar</button>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-md-12">
                <div class="">
                  <table id="TableHistoriaMovimiento" class="table table-bordered table-condensed table-hover">
                    <thead>
                      <tr>
                        <th>Historia</th>
                        <th>Paciente</th>
                        <th>Edad</th>
                        <th>DNI</th>
                        <th>Fecha de Registro</th>
                        <th>Tipo de Historia</th>
                        <th>Opciones</th>
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

