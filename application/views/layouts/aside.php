        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MODULOS PRINCIPALES</li>
                    <li>
                        <a href="<?php echo base_url();?>dashboard">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class=" fa fa-wrench"></i> <span>Mantenimiento</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            <li class="treeview">
                                <a href="<?php echo base_url();?>mantenimiento/area">
                                    <i class="fa  fa-users">
                                    </i>
                                    <i class="fa fa-angle-left pull-right"></i> Gestion
                            </a>
                            <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>mantenimiento/paciente"><i class="fa fa fa-male"></i>Paciente</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/medico"><i class="fa fa-user-md"></i>Odontologo</a></li>
                             </ul>
                            </li>

                             <li class="treeview">
                                <a href="<?php echo base_url();?>mantenimiento/area">
                                    <i class="fa fa-suitcase">
                                    </i>
                                    <i class="fa fa-angle-left pull-right"></i>Procedimiento
                            </a>
                            <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>mantenimiento/tarifario"><i class="fa fa fa-usd"></i>Tarifario</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/diagnostico"><i class="fa fa fa-medkit"></i>Diagnostico</a></li>
                             </ul>
                            </li>  

                                 <li class="treeview">
                                <a href="<?php echo base_url();?>mantenimiento/area">
                                    <i class="fa fa-file-text-o">
                                    </i>
                                    <i class="fa fa-angle-left pull-right"></i>Catalogo
                            </a>
                            <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>mantenimiento/medida"><i class="fa fa-cube"></i>Unidad. Medida</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/concepto"><i class="fa fa-hand-o-right"></i>Tipo concepto</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/categoria"><i class="fa fa fa-diamond"></i>Categoria</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/especialidad"><i class="fa fa-plus-square"></i>Especialidad</a></li>
                                 <li><a href="<?php echo base_url();?>mantenimiento/citado"><i class="fa fa-stethoscope"></i>Tipo citado</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/alergia"><i class="fa fa-stethoscope"></i>Alergia</a></li>
                             </ul>
                            </li> 

                            <li class="treeview">
                                <a href="<?php echo base_url();?>mantenimiento/area">
                                    <i class="fa fa-cog">
                                    </i>
                                    <i class="fa fa-angle-left pull-right"></i>Conf. general
                            </a>
                            <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>mantenimiento/paciente"><i class="fa fa-file-text-o fa-rotate-45"></i>Mi clinica</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/tipodocumento"><i class="fa fa-newspaper-o"></i>Tipo documento</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/medico"><i class="fa fa-print"></i>Impresoras</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/medico"><i class="fa fa-plus-square-o"></i>Correlativos</a></li>
                          
                             </ul>
                            </li> 

                             <li class="treeview">
                                <a href="<?php echo base_url();?>mantenimiento/area">
                                    <i class="fa  fa-bank">
                                    </i>
                                    <i class="fa fa-angle-left pull-right"></i>Caja
                            </a>
                            <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>mantenimiento/paciente"><i class="fa fa-cube"></i>Cajeros</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/pago"><i class="fa fa-newspaper-o"></i>Tipo pago</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/moneda"><i class="fa fa-dollar"></i>Moneda</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/banco"><i class="fa fa-cubes"></i>Banco</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/tarjeta"><i class="fa fa-cc-visa"></i>Tipo tarjeta</a></li>
                             </ul>
                            </li> 


                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-calendar"></i> <span>Citas</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>citas/agenda"><i class="fa fa-table"></i> Agenda</a></li>
                            <li><a href="<?php echo base_url();?>citas/registrar"><i class="fa fa-calendar-plus-o"></i> Registrar</a></li>
                        </ul>
                    </li>

                     <li class="treeview">
                        <a href="#">
                            <i class="fa fa-medkit "></i> <span>Tratamientos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('tratamientos/panel') ?>"><i class="fa fa-sign-out"></i>Registrar</a>
                            <li><a href="<?= base_url('tratamientos/comprobantes') ?>"><i class="fa fa-sign-out"></i>Comprobantes</a>
                        </ul>
                    </li>
<!-- 
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-inbox "></i> <span>Caja</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                           
                            <li><a href="<?= base_url('tratamientos/panel') ?>"><i class="fa fa-folder-open-o"></i>Apertura</a>
                             <li><a href="<?= base_url('tratamientos/panel') ?>"><i class="fa fa-lock"></i>Cierre</a>
                                 <li><a href="<?= base_url('tratamientos/panel') ?>"><i class="fa fa-hand-o-right"></i>Consulta de caja</a>
                                     <li><a href="<?= base_url('tratamientos/panel') ?>"><i class="fa fa-arrow-right"></i>Ingreso</a>
                             <li><a href="<?= base_url('tratamientos/panel') ?>"><i class="fa fa-arrow-left"></i>Egreso</a>
                                 <li><a href="<?= base_url('tratamientos/panel') ?>"><i class="fa fa-exchange"></i>Transferencia</a>
                        </ul>
                    </li>
 -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text-o "></i> <span>Historia clinica</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('historia/movimiento')?>"><i class="fa fa-circle-o"></i>Movimiento</a></li>
                            <li><a href="<?php echo base_url();?>historia/movimiento"><i class="fa fa-circle-o"></i>Kardex</a></li>
                        </ul>
                    </li>

             
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-print fa-lg"></i> <span>Reportes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>reportes/iconos"><i class="glyphicon glyphicon-signal"></i>Estadistica admisión</a></li>
                            <li><a href="<?php echo base_url();?>reportes/icoemergencia"><i class="glyphicon glyphicon-signal"></i>Estadistica emergencia</a></li>
                            <li><a href="<?php echo base_url();?>reportes/iconos"><i class="glyphicon glyphicon-signal"></i>Estadistica hospitalización</a></li>
                             <li><a href="<?php echo base_url();?>reportes/iconos"><i class="glyphicon glyphicon-signal"></i>Estadistica farmacia</a></li>
                             <li><a href="<?php echo base_url();?>reportes/iconos"><i class="glyphicon glyphicon-signal"></i>Estadistica medico</a></li>
                            <li><a href="../../index.html"><i class="glyphicon glyphicon-user"></i> Clientes</a></li>
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Ocurrencias</a></li>
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Ventas</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i> <span>Administrador</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                         
                            
                             <li><a href="<?php echo base_url();?>mantenimiento/Permisos"><i class="fa fa-id-card"></i> Rol</a></li>
                             <li><a href="<?php echo base_url();?>mantenimiento/usuario"><i class="fa fa-user-o"></i> Usuarios</a></li>
                             <li><a href="<?php echo base_url();?>administrador/permisos"><i class="fa fa-unlock-alt fa-2"></i> Permisos</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->
