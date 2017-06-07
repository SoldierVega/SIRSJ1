<!DOCTYPE html>
<html lang="es">

    <head style="background-color: black">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
<!--    <meta http-equiv="Refresh" content="30">-->
    <meta name="author" content="">

    <title>SIR </title>

     <link rel="stylesheet" href="<?php echo base_url() . "/media/vendor/bootstrap/css/bootstrap.min.css"; ?>">

    <!-- MetisMenu CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . "/media/vendor/metisMenu/metisMenu.min.css"; ?>">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . "/media/vendor/datatables-plugins/dataTables.bootstrap.css"; ?>">
    
    <!-- DataTables Responsive CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . "/media/vendor/datatables-responsive/dataTables.responsive.css"; ?>">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . "/media/dist/css/sb-admin-2.css"; ?>">

    <!-- Morris Charts CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . "/media/vendor/morrisjs/morris.css"; ?>">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="<?php echo base_url() . "/media/vendor/font-awesome/css/font-awesome.min.css"; ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
<link href="<?php echo base_url() . 'media/js/validacion.css' ?>" rel="stylesheet" type="text/css"/>



    <script src="<?php echo base_url() . 'media/js/validacion.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'media/vendor/jquery/jquery.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'media/vendor/bootstrap/js/bootstrap.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'media/vendor/metisMenu/metisMenu.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'media/vendor/datatables/js/jquery.dataTables.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'media/vendor/datatables-plugins/dataTables.bootstrap.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'media/vendor/datatables-responsive/dataTables.responsive.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'media/vendor/raphael/raphael.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'media/vendor/morrisjs/morris.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'media/dist/js/sb-admin-2.js' ?>" type="text/javascript"></script>
    
    
    <link rel="stylesheet" type="text/css" media="screen"
     href="<?php echo base_url() . 'media/datepicker/bootstrap-datetimepicker.min.css' ?>">
    
    <?php
    
    $rol=$this->session->userdata('perfil');
    $nom=$this->session->userdata('nombre');
    ?>
    
     <div id="wrapper fond">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
               
                <a class="navbar-brand" href="<?php echo base_url() . "Bienvenido"; ?>">SIR-SJ1 Sistema Integral de Reportes San Jose 1</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <?php echo $nom.' ';?><i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url() . "login/logout_ci"; ?>"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse ">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a><i class="fa fa-group fa-fw"></i> <?php echo $rol;?></a>
                            
                        </li>
                        <li>
                            <a href="<?php echo base_url(). "usuarios"; ?>"><i class="fa fa-user fa-fw"></i> <FONT FACE="Californian FB" SIZE="+1"> Usuarios</FONT></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book"><FONT FACE="Californian FB" SIZE="+1    "> Captura</FONT></i><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a  class="fa fa-edit" href="<?php echo base_url(). "Calidad"; ?>"><FONT FACE="Californian FB" SIZE="+1    "> Calidad</FONT></a>
                                    </li>
                                    <li>
                                        <a  class="fa fa-edit" href="<?php echo base_url(). "Produccion"; ?>"> <FONT FACE="Californian FB" SIZE="+1    "> Producción</FONT></a>
                                    </li>
                                    <li>
                                        <a  class="fa fa-edit" href="<?php echo base_url(). "Tiempomuerto"; ?>"> <FONT FACE="Californian FB" SIZE="+1    "> Tiempo Muerto</FONT></a>
                                    </li>
                                    <li>
                                        <a  class="fa fa-edit" href="<?php echo base_url(). "rechazos"; ?>"> <FONT FACE="Californian FB" SIZE="+1    "> Rechazos</FONT></a>
                                    </li>
                                </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart"></i><FONT FACE="Californian FB" SIZE="+1    "> Estadisticas</FONT><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a class="fa fa-clipboard" href="#"> <FONT FACE="Californian FB" SIZE="+1    "> Reporte</FONT><span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level">

                                                <li>
                                                    <a class="fa fa-file-excel-o" href="<?php echo base_url(). "Reportes/reporteDiario"; ?>"> <FONT FACE="Californian FB" SIZE="+1"> Diario</FONT></a>
                                                </li>
                                                <li>
                                                    <a class="fa fa-file-excel-o" href="<?php echo base_url(). "Reportes/reporteTM"; ?>"> <FONT FACE="Californian FB" SIZE="+1"> Tiempo Muerto</FONT></a>
                                                </li>
                                                <li>
                                                    <a class="fa fa-file-excel-o" href="<?php echo base_url(). "Reportes/tabla"; ?>"> <FONT FACE="Californian FB" SIZE="+1"> Tabla Controlista</FONT></a>
                                                </li>
                                                 <li>
                                                    <a class="fa fa-file-excel-o" href="<?php echo base_url(). "Reportes/defectos"; ?>"> <FONT FACE="Californian FB" SIZE="+1"> Defectos</FONT></a>
                                                </li>
                                                <li>
                                                    <a class="fa fa-file-excel-o" href="<?php echo base_url(). "Reportes/rechazos"; ?>"> <FONT FACE="Californian FB" SIZE="+1"> Rechazos</FONT></a>
                                                </li>
                                                

                                            </ul>
                                    </li>
                                </ul>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a class="fa fa-area-chart" href="#"> <FONT FACE="Californian FB" SIZE="+1"> Diagramas de Pareto</FONT><span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level">

                                                <li>
                                                    <a class="fa fa-line-chart" href="<?php echo base_url(). "diagramas/paretoPerdida"; ?>">  <FONT FACE="Californian FB" SIZE="+1"> Perdida</FONT></a>
                                                </li>
                                                <li>
                                                    <a class="fa fa-line-chart" href="<?php echo base_url(). "diagramas/paretoSegunda"; ?>"> <FONT FACE="Californian FB" SIZE="+1"> Segunda</FONT></a>
                                                </li>
                                                <li>
                                                    <a class="fa fa-line-chart" href="<?php echo base_url(). "diagramas/paretoTM"; ?>">  <FONT FACE="Californian FB" SIZE="+1"> Tiempo Muerto</FONT></a>
                                                </li>
                                                <li>
                                                    <a class="fa fa-line-chart" href="<?php echo base_url(). "diagramas/paretoRechazo"; ?>">  <FONT FACE="Californian FB" SIZE="+1"> Rechazos</FONT></a>
                                                </li>

                                            </ul>
                                    </li>
                                </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo base_url(). "Disenio"; ?>"><i class="fa fa-edit fa-fw"></i> <FONT FACE="Californian FB" SIZE="+1"> Diseños</FONT></a>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-folder-close"></i><FONT FACE="Californian FB" SIZE="+1"> Catalogos</FONT><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class="glyphicon glyphicon-folder-open" href="#"> <FONT FACE="Californian FB" SIZE="+1"> Selección</FONT><span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                           
                                            <li>
                                                <a href="<?php echo base_url(). "Cuerpo"; ?>"><FONT FACE="Californian FB" SIZE="+1"> Cuerpo</FONT></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(). "Tripulacion"; ?>"><FONT FACE="Californian FB" SIZE="+1"> Tripulación</FONT></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(). "Esmaltador"; ?>"><FONT FACE="Californian FB" SIZE="+1"> Esmaltador</FONT></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(). "Formato"; ?>"><FONT FACE="Californian FB" SIZE="+1"> Formato</FONT></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(). "Causa"; ?>"><FONT FACE="Californian FB" SIZE="+1"> Causa</FONT></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(). "Tipo"; ?>"><FONT FACE="Californian FB" SIZE="+1"> Tipo</FONT></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(). "Linea"; ?>"><FONT FACE="Californian FB" SIZE="+1"> Linea</FONT></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(). "Equivalencia"; ?>"><FONT FACE="Californian FB" SIZE="+1"> Equivalencia</FONT></a>
                                            </li>  
                                        </ul>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>  
        </nav>
    </div>

</head>


<body > 
    