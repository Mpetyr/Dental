
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <section class="content">
            <div class="box box-solid">
                <div class="panel-heading">
               <div class="box-header with-border">
                  <h3 class="box-title" >Empleados</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                </div>


                <div class="box-body">
                            <?php if($this->session->flashdata("error")):?>
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error");?></p>  
                                </div>
                            <?php endif;?>
                                <form action="<?php echo base_url();?>mantenimiento/usuario/user_add" method="POST">
                                  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                       <label>Los campos con (*) son olbigatorios</label>
                                  </div>

                               <div class="row">
                                   <div class="col-lg-12 left">
                                      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                         <div class="form-group has-success has-feedback">
                                             <label for="apellido">Apellidos (*):</label>
                                               <input type="text" maxlength="50" class="form-control"  name="apellido" required="" placeholder="apellido" autofocus="">
                                               <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                                        </div>
                                   </div>
                                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group has-success has-feedback">
                                           <label for="nombre">Nombre (*):</label>
                                             <input  type="text" maxlength="20" name="nombre" required="" class="form-control" placeholder="nombre" autofocus="" />
                                              <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                                       </div>
                                     </div>
                                                                   
                                  </div>

                                  <div class="col-lg-12 left">
                                      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                         <div class="form-group has-success">
                                             <label for="apellido">Telefono (*):</label>
                                               <input type="text" maxlength="50" class="form-control"  name="telefono" required="" placeholder="telefono" autofocus="">
                                        </div>
                                   </div>
                                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group has-success">
                                           <label for="nombre">Dirección (*):</label>
                                             <input id="txtNombre" type="text" maxlength="80" name="direccion" required="" class="form-control" placeholder="direccion" autofocus="" />
                                       </div>
                                     </div>
                                                                     
                                  </div>

                                         <div class="col-lg-12 left">
                                             
                                                  <div class="col-lg-2 col-sm-2 col-sm-2 col-xs-12">
                                                      <div class="form-group has-success">
                                                          <label>Tipo Documento (*):</label>
                                                          <select  name="tipo_documento" class="form-control">
                                                            <option value="1">DNI</option>
                                                            <option value="2">RUC</option>
                                                            <option value="3">PASAPORTE</option>
                                                            <option value="4">NIC</option>
                                                            <option value="5">CEDULA</option>


                                                          </select>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                      <div class="form-group has-success">
                                                          <label>Documento (*):</label>
                                                          <input  type="text" maxlength="20" name="documento" required="" class="form-control" placeholder="Número de documento" autofocus="" />
                                                      </div>
                                                  </div>

                                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                      <div class="form-group has-success">
                                                          <label>Email (*):</label>
                                                          <input  type="text" maxlength="20" name="email" required="" class="form-control" placeholder="Email" autofocus="" />
                                                      </div>
                                                  </div>
                                           
                                            </div>

                <div class="col-lg-12 left">
               
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group has-success">
                                <label>Fecha Registro (*):</label>
                                <input  type="date" name="fecha_registro" class="form-control" autofocus="" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group has-success">
                                <label>Foto :</label>
                                <input  type="file" class="form-control" name="foto" autofocus="" />
                            <!-- <input type="text" class="form-control" name="txtRutaImgEmp" autofocus="" /> -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group has-success">
                                <label>Estado (*):</label>
                                <select class="form-control" required="" name="esta_usu" >
                                  <option value="1">Activado</option>
                                  <option value="0">Inactivo</option>
   
                                </select>
                            </div>
                        </div>
                 </div>

                     <div class="col-lg-12 left">
                
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 left">
                            <div class="form-group has-success">
                                <label>Login (*):</label>
                                <input  type="text" class="form-control" required="" maxlength="50" name="logi_usu" autofocus="" />

                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 left">
                            <div class="form-group">
                                <div class="form-group has-success">
                                    <label>Clave (*):</label>
                                    <input  type="password" required="" class="form-control" maxlength="32" name="pass_usu" autofocus="" />
                                   
                                </div>
                            </div>
                        </div>

                         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group has-success">
                                <label>Rol (*):</label>
                                <select name="codi_rol" class="form-control ">
                                   <?php foreach ($rol as $roles):?> 
                                    <option value="<?php echo $roles->codi_rol?>">
                                    <?php echo $roles->nomb_rol;?>
                                   </option>
                                   <?php endforeach;?>
                                 </select>
                            </div>
                        </div>
                     </div>
                                           
                 </div>

                                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
                                       <a href="<?php echo base_url();?>mantenimiento/usuario/" class="btn btn-primary" ><i class="fa fa-remove"></i> Cancelar</a>
                                     </div>  
                                     

                                </div>
                             </form>
                </div>


            </div>


          </section>

        </div>

          
             
                        
                         
