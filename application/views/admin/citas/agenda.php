<script src="<?= base_url() ?>assets/plugins/calendar/js/calendar.js"></script>
<script src="<?= base_url() ?>assets/plugins/calendar/js/underscore-min.js"></script>
<script src="<?= base_url() ?>assets/plugins/calendar/js/language/es-ES.js"></script>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Citas<!-- <small>Registrar</small> --></h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">AGENDA</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-3">
                <form id="FormAgendaFiltro" autocomplete="off">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label">Especialidad</label>
                        <select name="especialidad" class="form-control">
                          <option value="">Seleccione</option>
                          <?php foreach ($especialidad as $e): ?>
                            <option value="<?= $e->cod_especialidad ?>"><?= $e->nombre_especialidad ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label">Médico</label>
                        <select name="medico" class="form-control">
                          
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="control-label">Estado</label>
                      <div class="form-group">
                        <select name="estado" class="form-control">
                        <option value="">Todos</option>
                        <?php foreach ($estados as $o): ?>
                        <option value="<?= $o->cod_citado ?>"><?= $o->nomb_citado ?></option>
                        <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group grupo">
                        <input type="text" name="fecha" class="form-control hidden" data-lang="es" data-format="Y-m-d" data-inline="true" data-max-year="2030">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filtrar</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-md-9">
                <div class="row">
                  <div class="col-md-12">
                    <div class="botones">
                      <div class="btn-group">
                        <button class="btn btn-primary" data-calendar-nav="prev"><< Anterior</button>
                        <button class="btn btn-default" data-calendar-nav="today">Hoy</button>
                        <button class="btn btn-primary" data-calendar-nav="next">Siguiente >></button>
                      </div>
                      <h4></h4>
                    </div>
                    <div class="form-group">
                      <div class="radio-inline">
                        <label class="checkbox">
                          <input type="radio" name="vista" value="year" data-calendar-view="year"> Año
                        </label>
                      </div>
                      <div class="radio-inline">
                        <label class="checkbox">
                          <input type="radio" name="vista" value="month" data-calendar-view="month"> Mes
                        </label>
                      </div>
                      <div class="radio-inline">
                        <label class="checkbox">
                          <input type="radio" name="vista" value="week" data-calendar-view="week"> Semana
                        </label>
                      </div>
                      <div class="radio-inline">
                        <label class="checkbox">
                          <input type="radio" name="vista" value="day" data-calendar-view="day" checked> Día
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="calendar"></div>
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


<div class="modal fade" id="events-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>