<!DOCTYPE html>
<html lang="en">

 <head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

  



  <title>Usuario</title>


</head>

<body>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        USUARIOS

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Mantenimiento</a></li>
        <li><a href="#">Tabla</a></li>
        <li class="active">Usuarios</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
               <?php if($this->session->flashdata("error")):?>
                                <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error");?></p>  
                                </div>
                            <?php endif;?>

          <div class="box">
            <div class="box-header">
              <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

              <a  href="<?php echo base_url();?>mantenimiento/usuario/add" class="btn btn-primary" id="btnNuevo"><i class="fa fa-file"></i> Nuevo </a>
                    <br><br>
                 <table id="example1" class="table table-bordered btn-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 0.3%; text-align: center">Codigo</th>
                                                <th style="width: 3%; text-align: center">Apellidos</th>
                                             
                                                 <th style="width: 3%; text-align: center">Fecha de registro</th>
                         
                                                   <!-- <th>Email</th> -->
                                                   <th style="width: 1%; text-align: center">Usuario</th>
                                               
                                                  <th style="width: 2%; text-align: center">Rol</th>

                                                   <th style="width: 4%; text-align: center">Estado</th>
                                        
                                                  <th style="width: 1%; text-align: center">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($user)):?>
                                                <?php foreach($user as $users):?>
                                            <tr>
                                                <td><?php echo $users->codi_usu;?></td>
                                                <td><?php echo $users->apellido . ', ' .$users->nombre;?></td>
                                                <!-- <td><?php echo $users->nombres;?></td> -->
                                                <td><?php echo $users->fecha_registro;?></td>
                                         
                                                  <!-- <td><?php echo $users->email;?></td> -->
                                                   <td><?php echo $users->logi_usu;?></td>
                                                
                                                   <td><?php echo $users->rol;?></td>
                                              
                                                   <td style="text-align: center;"><?php if($users->esta_usu == '1'){$text_estado="activo";$label_class='label-success';}   else {$text_estado="inactivo";$label_class='label label-warning';}?>
                                                    <span class="label <?php echo $label_class;?>"><?php echo $text_estado; ?></span>
                                                  </td>
                                                <td>
                                                    <div class="btn-footer text-center">

                                                        <button class="btn btn-warning" onclick="edit_user(<?php echo $users->codi_usu;?>)">
                                                            <i class="glyphicon glyphicon-pencil"></i></button>

                                                        <button class="btn btn-danger"  href="javascript:void()" onclick="delete_person(<?php echo $users->codi_usu;?>)">
                                                         <i class="glyphicon glyphicon-trash"></i></button>
                                                        <!-- <a onclick="if(confirma()==false) return false"  href="<?php echo base_url()?>mantenimiento/Area/delete/<?php echo $areas->id_area;?>" class="btn-sm btn-danger btn-remove"><i class="glyphicon glyphicon-trash"></i>Desactivar</a> -->

                                                       <!--  <a onclick=href="#" class="btn-sm btn-info"><i class="fa fa-eye"></i>View</a> -->
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        <?php endif;?>
                                        </tbody>
                                    </table>
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

<script type="text/javascript">
    
    function add_user()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

     function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('mantenimiento/usuario/user_add')?>";
      }
      else
      {
        url = "<?php echo site_url('mantenimiento/usuario/user_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            beforeSend: function(){
              console.log($('#form').serialize());
            },
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
               location.reload();
               swal(
                'Good job!',
                'Data has been save!',
                'success'
                )
              // location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

     function edit_user(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('mantenimiento/usuario/user_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="codi_usu"]').val(data.codi_usu);
            $('[name="apellido"]').val(data.apellido);
            $('[name="nombre"]').val(data.nombre);
            $('[name="fecha_registro"]').val(data.fecha_registro);
            $('[name="telefono"]').val(data.telefono);
             $('[name="direccion"]').val(data.direccion);
            $('[name="email"]').val(data.email);
            $('[name="tipo_documento"]').val(data.tipo_documento);
            $('[name="documento"]').val(data.documento);
            $('[name="foto"]').val(data.foto);
            $('[name="logi_usu"]').val(data.logi_usu);
            $('[name="pass_usu"]').val(data.pass_usu);
            $('[name="codi_rol"]').val(data.codi_rol);
            $('[name="esta_usu"]').val(data.esta_usu);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editar Usuario'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }


    /*function delete_user(id)
    {
      if(confirm('Desea desactivar rol?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('mantenimiento/usuario/delete/')?>/"+id,
            type: "POST",
            dataType: "JSON",
             beforeSend: function(){
              console.log($('#form').serialize());
            },
            success: function(data)
            {
               
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Desactivación');
            }
        });

      }
    }
*/
     function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }

    function delete_person(id)
       {
    swal({
        title: 'Desea anular?',
        text: "Esta seguro..!!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, anular!',
        closeOnConfirm: false
      }).then(function(isConfirm) {
        if (isConfirm) {

     // ajax delete data to database
     $.ajax({
      url : "<?php echo base_url('mantenimiento/usuario/delete')?>/"+id,
      type: "post",

      data: {id:id},
 
      success: function()
      {
               //if success reload ajax table
               
               swal(
                'Deleted!','Your file has been deleted.',  'success'  );
                $("#delete_"+id).fadeTo("show",0.7, function(){
                  $(this).remove();
                })
              
              
             },
             error: function ()
             {
              swal('Error adding / update data');
            }
          });

     
   }
 })
    }
</script>


<div class="modal fade bd-example-modal-lg" id="modal_form" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">REGISTRO DE USUARIOS</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="codi_usu" />
          <div class="form-body">
             
                     <div class="col-lg-12 left">
                                      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                         <div class="form-group has-success has-feedback">
                                             <label for="apellido">Apellidos :</label>
                                               <input type="text" maxlength="50" class="form-control"  name="apellido" required="" placeholder="apellido" autofocus="">
                                               <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                        </div>
                                   </div>

                                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group has-success has-feedback">
                                           <label for="nombre">Nombre :</label>
                                             <input  type="text" maxlength="20" name="nombre" required="" class="form-control" placeholder="nombre" autofocus="" />
                                            <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                       </div>
                                     </div>
                                                                   
                    </div>

                        <div class="col-lg-12 left">
                                      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                         <div class="form-group has-success has-feedback">
                                             <label for="apellido">Telefono:</label>
                                               <input type="text" maxlength="50" class="form-control"  name="telefono" required="" placeholder="apellido" autofocus="">
                                               <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                        </div>
                                   </div>

                                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group has-success has-feedback">
                                           <label for="nombre">Dirección:</label>
                                             <input  type="text" maxlength="20" name="direccion" required="" class="form-control" placeholder="nombre" autofocus="" />
                                             <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
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
                                                      <div class="form-group has-success has-feedback">
                                                          <label>Documento (*):</label>
                                                          <input  type="text" maxlength="20" name="documento" required="" class="form-control" placeholder="Número de documento" autofocus="" />
                                                          <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                                      </div>
                                                  </div>

                                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                      <div class="form-group has-success has-feedback">
                                                          <label>Email (*):</label>
                                                          <input  type="text" maxlength="20" name="email" required="" class="form-control" placeholder="Email" autofocus="" />
                                                          <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
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
                            <div class="form-group has-success  has-feedback">
                                <label>Login (*):</label>
                                <input  type="text" class="form-control" required="" maxlength="50" name="logi_usu" autofocus="" />
                                 <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 left">
                            <div class="form-group">
                                <div class="form-group has-success  has-feedback">
                                    <label>Clave (*):</label>
                                    <input  type="password" required="" class="form-control" maxlength="32" name="pass_usu" autofocus="" />
                                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                </div>
                            </div>
                        </div>

                         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group has-success">
                                <label>Rol (*):</label>
                                <select name="codi_rol" class="form-control">
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
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
  

 <script type="text/javascript">
       $('#divMiCalendario').datetimepicker({
          format: 'YYYY-MM-DD HH:mm:ss',
          
      });
   
      $('#divMiCalendario').data("DateTimePicker").hide();

  </script>


</body>    
</html>