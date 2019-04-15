<!DOCTYPE>
<html>

<head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



  <title>Editar</title>

</head>
<body>
     <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Permisos
                <small>Editar</small>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid">
                    <div class="box-body">
                         <hr>
                         <div class="row">
                             <div class="col-md-12">
                                <?php if($this->session->flashdata("error")):?>
                                <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error");?></p>  
                                </div>
                            <?php endif;?>
                                <form action="<?php echo base_url();?>mantenimiento/permisos/update" method="POST">
                                    <input type="hidden" name="id_permiso" value="<?php echo $permiso->id_permiso;?>">
                                     <DIV class="form-group">
                                        <label for="rol">Roles:</label>
                                        <select name="id_rol" id="id_rol" class="form-control" >
                                          <?php foreach ($rol as  $roles):?> 
                                    <option value="<?php echo $roles->id_rol;?>" <?php echo $roles->id_rol == $permiso->id_rol ? "selected":"";?>>
                                    <?php echo $roles->nombre;?></option>
                                          <?php endforeach;?>
                                         
                                        </select>
                                    
                                    </DIV>

                                    <DIV class="form-group">
                                        <label for="menu">Menu:</label>
                                        <select name="id_menu" id="id_menu" class="form-control" >
                                          <?php foreach ($menus as  $menu):?> 
                                    <option value="<?php echo $menu->id_menu;?>" <?php echo $menu->id_menu == $permiso->id_menu  ? "selected":"";?>>
                                    <?php echo $menu->nombre;?></option>
                                          <?php endforeach;?>
                                         
                                        </select>
                                    
                                    </DIV>
                                     <DIV class="form-group">
                                        <label for="read">Leer: </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="read" value="1" <?php echo $permiso->read == 1 ? "checked":"";?>> Si
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="read" value="0" <?php echo $permiso->read == 0 ? "checked":"";?>> No
                                        </label>
                                    </DIV>

                                    <DIV class="form-group">
                                        <label for="read">Insertar: </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="insert" value="1" <?php echo $permiso->insert == 1 ? "checked":"";?>> Si
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="insert" value="0" <?php echo $permiso->insert == 0 ? "checked":"";?>> No
                                        </label>
                                    </DIV>

                                    <DIV class="form-group">
                                        <label for="read">Update: </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="update"  value="1" <?php echo $permiso->update == 1 ? "checked":"";?>> Si
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="update" value="0" <?php echo $permiso->update == 0 ? "checked":"";?>> No
                                        </label>
                                    </DIV>

                                    <DIV class="form-group">
                                        <label for="read">Anular: </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="delete" value="1" <?php echo $permiso->delete == 1 ? "checked":"";?>> Si
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="delete" value="0" <?php echo $permiso->delete == 0 ? "checked":"";?>> No
                                        </label>
                                    </DIV>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success"> <span class="fa fa-save">          Guardar</button>
                                        
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
</body>
</html>    
