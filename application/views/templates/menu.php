<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIR_SJ1</title>

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

    
    <script src="<?php echo base_url() . 'media/vendor/jquery/jquery.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'media/vendor/bootstrap/js/bootstrap.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'media/vendor/metisMenu/metisMenu.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'media/vendor/datatables/js/jquery.dataTables.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'media/vendor/datatables-plugins/dataTables.bootstrap.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'media/vendor/datatables-responsive/dataTables.responsive.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'media/vendor/raphael/raphael.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'media/vendor/morrisjs/morris.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'media/dist/js/sb-admin-2.js' ?>" type="text/javascript"></script>
    

   
    
    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() . "Bienvenido"; ?>">SIR-SJ1 Sistema Integral de Reportes San Jose 1</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url() . "login"; ?>"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> ADMINISTRADOR</a>
                            
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Capturas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url() . "Calidad"; ?>">Captura Calidad</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(). "Produccion"; ?>">Captura Poducción</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(). "Tiempomuerto"; ?>">Captura Tiempo Muerto</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-bar-chart-o fa-fw"></i> Reportes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url() . "Reportes/reporteDiario"; ?>">Reporte Diario</a>
                                </li>
                                <li>
                                    <a href="morris.html">Reporte Tiempo Muerto</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url(). "Disenio"; ?>"><i class="fa fa-edit fa-fw"></i> Diseños</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Catalogos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                <a href="#">Selección <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="<?php echo base_url(). "Cuerpo"; ?>">Cuerpo</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(). "Tripulacion"; ?>">Tripulación</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(). "Esmaltador"; ?>">Esmaltador</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(). "Formato"; ?>">Formato</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(). "Causa"; ?>">Causas</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(). "Tipo"; ?>">Tipo</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(). "Linea"; ?>">Lineas</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(). "Equivalencia"; ?>">Equivalencia</a>
                                        </li>
                                    </ul>
                            </li>
                                <li>
                                    <a href="#">...... <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">....</a>
                                        </li>
                                        <li>
                                            <a href="#">...</a>
                                        </li>
                                        <li>
                                            <a href="#">.....</a>
                                        </li>
                                        <li>
                                            <a href="#">....</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

  <!--  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bienvenido..</h1>
                </div>
                
            </div>
                  
          
        </div>
         /#page-wrapper -->
        
       
    </div>
    <!-- /#wrapper -->

    
    
   
   
    
