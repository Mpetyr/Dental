 
<!DOCTYPE html>
<html lang="en">

 <head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

  



  <title>Rol</title>


</head>

<body>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ROLES

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

              <a  href="<?php echo base_url();?>mantenimiento/rol/add" class="btn btn-primary" id="btnNuevo"><i class="fa fa-file"></i> Nuevo </a>
                    <br><br>
    <!-- Main content -->
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                   <th style="width: 2%; text-align: center">Secuencia</th>
                  <th style="width: 8%; text-align: center">Rol</th>
                  <th style="width: 5%; text-align: center">Estado</th>
                 <th style="width: 5%; text-align: center">Opciones</th>
                </tr>
                </thead>
                <tbody>
                
                
                 <?php if(!empty($rol)):?>
                                                <?php foreach($rol as $roles):?>
                                            <tr>
                                                <td ><?php echo $roles->codi_rol;?></td>
                                                <td><?php echo $roles->nomb_rol;?></td>
                                                    <td style="text-align: center;"><?php if($roles->esta_rol == '1'){$text_estado="activo";$label_class='label-success';}   else {$text_estado="inactivo";$label_class='label label-warning';}?>
                                                    <span class="label <?php echo $label_class;?>"><?php echo $text_estado; ?></span>
                                                  </td>
                                               
                                                <td>
                                                    <div class="btn-footer text-center">

                                                        <button class="btn btn-warning" onclick="edit_roles(<?php echo $roles->codi_rol;?>)">
                                                            <i class="glyphicon glyphicon-pencil"></i></button>

                                                        <button class="btn btn-danger btn-remove" onclick="delete_rol(<?php echo $roles->codi_rol;?>)">
                                                         <i class="glyphicon glyphicon-trash"></i>  </button>
                                                        <!-- <a onclick="if(confirma()==false) return false"  href="<?php echo base_url()?>mantenimiento/Area/delete/<?php echo $areas->id_area;?>" class="btn-sm btn-danger btn-remove"><i class="glyphicon glyphicon-trash"></i>Desactivar</a> -->

                                                       <!--  <a onclick=href="#" class="btn-sm btn-info"><i class="fa fa-eye"></i>View</a> -->
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        <?php endif;?>
               
                </tbody>
                <tfoot>
              
                </tfoot>
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


     function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }

     function save()
    {
      var url;
      if(save_method == 'update')
      {
           url = "<?php echo site_url('mantenimiento/rol/roles_update')?>";
      }
     
     

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",

            success: function(data)
            {
               //if success close modal and reload ajax table
              //  $('#modal_form').modal('hide');
              // location.reload();// for reload a page
               $('#modal_form').modal('hide');
              

               swal(
                'Good job!',
                'Data has been save!',
                'success',

                )
                location.reload();
               // location.reload();

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

     function edit_roles(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('mantenimiento/rol/roles_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="codi_rol"]').val(data.codi_rol);
            $('[name="nomb_rol"]').val(data.nomb_rol);
       
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('EDITAR ROLES'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }


  function delete_rol(id)
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
      url : "<?php echo base_url('mantenimiento/rol/delete')?>/"+id,
      type: "post",

      data: {id:id},
 
      success: function(data)
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


  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">AREA DE TRABAJO</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal" method="post">
          <input type="hidden" value="" name="codi_rol"/>
          <div class="form-body">
      

             <div class="form-group has-success">
              <label class="control-label col-md-2">Nombre :</label>
              <div class="col-md-6">
                <input name="nomb_rol" placeholder="" class="form-control" type="text">
              </div>
            </div>


          </div>
        </form>
          </div>

     
          <div class="modal-footer ">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->






</body>    

</html>