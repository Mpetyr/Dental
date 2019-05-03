
    

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Permisos
                <small>listado</small>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid">
                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?php echo base_url();?>administrador/permisos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>
                                Agregar Permisos</a>
                            </div>
                        </div>

                         <!-- tablas -->
                         <hr>
                         <div class="row">
                             <div class="col-md-12">
                                <div class="table-responsive">
                                  
                               
                                <table id="example1" class="table table-bordered btn-hover">
                                    <thead>
                                        <tr class="btn-primary" >
                                            <th style="text-align: center;">#</th>
                                            <th style="text-align: center;">Menu</th>
                                            <th style="text-align: center;">Rol</th>
                                            <th style="text-align: center;">Leer</th>
                                            <th style="text-align: center;">Insertar</th>
                                             <th style="text-align: center;">Actualizar</th>
                                              <th style="text-align: center;">Anular</th>
                                               <th style="text-align: center;">Opciones</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($permisos)):?>
                                            <?php foreach ($permisos as $permiso):?> 
                                        <tr>
                                            <td><?php echo $permiso->id_permiso;?></td>
                                            <td><?php echo $permiso->menu;?></td>
                                              <td><?php echo $permiso->roles;?></td>
                                            <td style="text-align: center;">
                                              <?php if($permiso->read==0):?>
                                                <span class="fa fa-times"></span>
                                                <?php else:?>
                                                  <span class="fa fa-check"></span>
                                                <?php endif; ?>
                                            </td>

                                            <td style="text-align: center;">
                                              <?php if($permiso->insert==0):?>
                                                <span class="fa fa-times"></span>
                                                <?php else:?>
                                                  <span class="fa fa-check"></span>
                                                <?php endif; ?>
                                            </td>
                                                
                                             <td style="text-align: center;">
                                              <?php if($permiso->update==0):?>
                                                <span class="fa fa-times"></span>
                                                <?php else:?>
                                                  <span class="fa fa-check"></span>
                                                <?php endif; ?>
                                            </td>
                                            
                                              <td style="text-align: center;">
                                              <?php if($permiso->delete==0):?>
                                                <span class="fa fa-times"></span>
                                                <?php else:?>
                                                  <span class="fa fa-check"></span>
                                                <?php endif; ?>
                                            </td>
                                       
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $categoria->id_categoria;?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>
                                                    <a href="<?php echo base_url()?>administrador/permisos/edit/<?php echo $permiso->id_permiso;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url()?>mantenimiento/permisos/delete/<?php echo $permiso->id_permiso;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                                                </div>
                                              </td>
                                        </tr> 
                                        <?php endforeach;?>      
                                     <?php endif;?>
                                    </tbody>
                                     </div>
                                </table>


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


<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Información de la categoria</h4>
              </div>
              <div class="modal-body">
             
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->