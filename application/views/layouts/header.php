<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dental</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

   
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Bootstrap 3.3.7 -->
          <!-- Datatbles -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/datatables-export/css/buttons.dataTables.min.css">


    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/datatables/css/dataTables.bootstrap.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/skins/_all-skins.min.css">
     


    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->

    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/Ionicons/css/ionicons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/select2.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/plugins/calendar/css/calendar.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datedropper3/datedropper.css">
    
    <link rel="stylesheet" href="<?= base_url() ?>assets/styles.css?v=08042019">
    <script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
           <a href="<?= base_url('dashboard') ?>" class="logo">
               <center>  <img style="width:60%;margin-top: auto;" src="<?= base_url() ?>assets/img/dentalsac.png"> </center> 
           </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown user user-menu">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url()?>assets/template/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= $this->session->userdata('nombre') ?></span>
                      </a>
                      <ul class="dropdown-menu">
                        
                        <li class="user-body">
                          <a href="<?php echo base_url(); ?>auth/logout"> Cerrar Sesión</a> 
                        </li>
                        
                      </ul>
                    </li>
                  </ul>
                </div>
            </nav>
          </header>