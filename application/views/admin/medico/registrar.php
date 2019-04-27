  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registrar medico
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Medico</a></li>
        <li class="active">Registrar</li>
      </ol>

  
    
    </section>

     
    <!-- Main content -->
    <section class="content">
       <form id='FormRegistrar' action="<?= base_url('mantenimiento/medico/guardar')?>" method="POST" autocomplete="OFF">
 
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?= base_url() ?>assets/img/Odontologo.jpg" alt="User profile picture">



              <p class="text-muted text-center">Odontologo</p>

              <ul class="list-group list-group-unbordered">
              
                <li class="list-group-item">
                    <b>Fecha registro</b> 
                <div class="form-group">
                  <div class="input-group date">
                    <input type='text' name="fecha_registro" class="form-control input-sm datepicker" value="<?= date('Y-m-d') ?>" readonly="readonly" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                  
                </div>
                  <!-- <b>Following</b> <a class="pull-right">543</a> -->
                </li>
               
              </ul>

              <a href="<?=base_url('mantenimiento/medico')?>" class="btn btn-primary btn-block" ><i class="fa fa-hand-o-left"></i> Regresar</a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

   
          <!-- /.box -->
        </div>

           <!-- /.col -->
        <div class="col-md-9">
          
           <div class="box box-primary collapsed-box">
             <div class="box-header with-border">
                 <div class="nav-tabs-custom">
           <!-- /.tab-pane -->
                   <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nombres *</label>
                      <input type="text" name="nombre" class="form-control input-sm" placeholder="Nombres">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-form-label">Apellidos *</label>
                      <input type="text" name="apellidos" class="form-control input-sm" placeholder="Apellidos">
                    </div>
                  </div>
            </div>

            <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                     <label class="control-label">Especialidad *</label>
                    <select  name="especialidad" class="form-control input-sm">
                      <option value="">Seleccione</option>
                    <?php foreach ($especialidades as $e): ?>
                      <option value="<?= $e->cod_especialidad ?>"><?= $e->nombre_especialidad ?></option>
                    <?php endforeach ?>
                    </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="col-form-label">Nro Doc *</label>
                      <input type="text" name="dni"  class="form-control input-sm" placeholder="Documento">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="col-form-label">Ruc</label>
                       <input type="text" name="ruc"  class="form-control input-sm" placeholder="Ruc">
                    </div>
                  </div>
            </div>

             <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="col-form-label">Dirección *</label>
                      <input type="text" name="direccion" required class="form-control input-sm" placeholder="Direccion">
                    </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                     <label class="control-label">Colegiatura *</label>
                       <input type="text" name="colegiatura"  class="form-control input-sm" placeholder="Colegiatura">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="control-label">Fecha nacimiento *</label>
                      <div class="input-group date">
                      
                      <input type="text"  name="fechanacimiento" class="form-control input-sm datepicker" >
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                     </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="col-form-label">Telefono</label>
                       <input type="text" name="telefono"  class="form-control input-sm" placeholder="telefono">
                    </div>
                  </div>
            </div>

                    <div class="row">

                      <div class="col-md-4">
                    <div class="form-group">
                      <label class="col-form-label">Celular</label>
                       <input type="text" name="celular"  class="form-control input-sm" placeholder="celular">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                   <label class="col-form-label">Sexo :</label>
                     <div class="radio">
          <label><input type="radio" name="sexo" value="M" checked="true" >Masculino</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <label><input type="radio" name="sexo" value="F"  >Femenino</label>
      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                     <label class="control-label">Estado *</label>
                      <select class="form-control input-sm" required="" name="esta_med" >
                                  <option value="S">Activado</option>
                                  <option value="N">Inactivo</option>
   
                                </select>
                    </div>
                  </div>
                 
            </div>
             
             <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="col-form-label">Correo *</label>
                      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="E-Mail Address" class="form-control input-sm"  type="text">
    </div>
                    </div>
                  </div>
              </div>

               <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
                                  
                                     </div>  
            </div>
            

          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
          </div>
         
         </div>
      </div>
      <!-- /.row -->

        </form>
    </section>
    <!-- /.content -->

     
  </div>
