<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->

  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
  <form action="../../index.html" method="post">
<div class="register-box" style="margin: 2px auto;">
  <div class="register-logo" style="margin-bottom: 10px;">
      <img src="/DentiDev/images/Empresa/logo.png">
    <!-- <a href="../../index2.html"><b>Admin</b>LTE</a> -->
  </div>

  <div class="register-box-body" >
    <h4 class="login-box-msg">Registra tus Datos</h4>

    
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Apellidos">
        <span class="glyphicon glyphicon-hand-left form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nombres">
        <span class="glyphicon glyphicon-hand-left form-control-feedback"></span>
      </div>

        <div class="form-group has-feedback">
        <select class="form-control input-sm" required="" name="estadocivil" >
                                  <option value="1">DNI</option>
                                  <option value="2">RUC</option>
                                  <option value="3">PASAPORTE</option>
                                  <option value="4">NIC</option>
                                  <option value="5">CEDULA</option>

                                </select>
      </div>

         <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Documento">
        <span class="glyphicon glyphicon-edit form-control-feedback"></span>
      </div>

          <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Odontologos">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

       <div class="form-group has-feedback">
        <select  name="departamento" class="select2 form-control input-sm">
                      <!-- <option value="">--Rol usuario--</option> -->
                    <?php foreach ($roles as $r): ?>
                      <option value="<?= $r->codi_rol ?>"><?= $r->nomb_rol ?></option>
                    <?php endforeach ?>
                    </select>
      </div>

      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

        <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
  
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-lg">Registrar</button>
        </div>
        <div class="row" style="">

                    <div class="col-xs-12" style="text-align:center;">
                        <h4><a href="<?php echo base_url();?>auth" class="text-center">Iniciar Sesion</a></h4>
                    </div>

                </div>
        <!-- /.col -->
      </div>
   

  <!--   <div class="social-auth-links text-center">

      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Siguenos en Facebook</a>
    
    </div> -->

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url();?>assets/template/bootstrap/jsregistro/jquery.backstretch.js"></script>
  <script src="<?php echo base_url();?>assets/template/bootstrap/jsregistro/jquery.backstretch.min.js"></script>
   <script src="<?php echo base_url();?>assets/template/bootstrap/jsregistro/scripts.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
 </form>
</body>
</html>
