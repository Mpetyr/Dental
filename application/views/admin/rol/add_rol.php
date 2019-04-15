
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
                  <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box box-solid">
                  <div class="panel-heading">
                <div class="box-header with-border">
                  <h3 class="box-title" >Roles</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
            </div>
                    <div class="box-body">
             
                        
                         <div class="row">
                             <div class="col-md-12">

                                <?php if($this->session->flashdata("error")):?>
                                <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error");?></p>  
                                </div>
                            <?php endif;?>
                                <form action="<?php echo base_url();?>mantenimiento/rol/rol_add" method="POST">
                                  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <label>Los campos con (*) son olbigatorios</label>
                </div>
          
                <div class="col-lg-8 left">
                    
                                     <div class="form-group has-success">
                                        <label for="nomb_rol">Nombre (*):</label>
                                        <input type="text" maxlength="50" class="form-control"  name="nomb_rol" required="" placeholder="nombre">
                                    </div>
                                   
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
                                       <a href="<?php echo base_url();?>mantenimiento/rol/" class="btn btn-primary" ><i class="fa fa-remove"></i> Cancelar</a>
                                    </div>
                                    
                </div>
                                 </form>
                             </div>
                         </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
