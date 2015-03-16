<?php
    session_start();
    if(!isset($_SESSION['user']))
        header('Location:loginform.php');
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin - Koinonia</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<link href="assets/css/lib/bootstrap.css" rel="stylesheet">
<link href="assets/css/lib/bootstrap-responsive.css" rel="stylesheet">
<link href="assets/css/boo-extension.css" rel="stylesheet">
<link href="assets/css/boo.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/boo-coloring.css" rel="stylesheet">
<link href="assets/css/boo-utility.css" rel="stylesheet">
<link href="assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">


<link rel="stylesheet" href="assets/css/token-input.css" type="text/css" />
<link rel="stylesheet" href="assets/css/token-input-facebook.css" type="text/css" />


<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="assets/ico/icon.ico">
</head>

<body class="sidebar-left ">
<div class="page-container">
    <div id="header-container">
        <div id="header">
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a class="brand" href="javascript:void(0);"><img src="assets/img/demo/logo.png" alt="logo"></a>
                        <div class="nav-collapse collapse">
                            <ul class="nav pull-right">
                                <li class="divider-vertical"></li>
                                <li><a id="btnLogout" class="btn-glyph fontello-icon-logout-1 tip" href="logout.php" title="logout"></a></li>
                                <li class="divider-vertical"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // navbar -->
            
            <div class="header-drawer">
                <div class="mobile-nav text-center visible-phone"> <a href="javascript:void(0);" class="mobile-btn" data-toggle="collapse" data-target=".sidebar"><i class="aweso-icon-chevron-down"></i> Components</a> </div>
                <!-- // Resposive navigation -->
                <div class="breadcrumbs-nav hidden-phone">
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li><a href="../index.php" target="_blank"><i class="fontello-icon-flag-1"></i> Ver sitio</a> <span class="divider">/</span></li>
                    </ul>
                </div>
                <!-- // breadcrumbs --> 
            </div>
            <!-- // drawer --> 
        </div>
    </div>
    <!-- // header-container -->
    
    <div id="main-container">
        <div id="main-sidebar" class="sidebar sidebar-inverse">
            <div class="sidebar-item">
                <div class="media profile">
                    <div class="media-thumb media-left thumb-bordereb"> <a class="img-shadow" href="javascript:void(0);"><img class="thumb" src="assets/img/demo/demo-avatar9604.jpg" alt="avatar img"></a> </div>
                    <div class="media-body">
                        <h5 class="media-heading"><?php echo strtoupper($_SESSION['user']); ?> <small>Administrador</small></h5>
                        
                    </div>
                </div>
            </div>
            <!-- // sidebar item - profile -->
            
            <ul id="mainSideMenu" class="nav nav-list nav-side">
                <li class="accordion-group">
                    <div class="accordion-heading <?php if($block=='principal'){echo 'active';} ?>"> <a href="#accIndex" data-parent="#mainSideMenu" data-toggle="collapse" class="accordion-toggle"> <span class="item-icon  fontello-icon-home-1"></span> <i class="chevron fontello-icon-right-open-3"></i> Home </a> </div>
                    <ul class="accordion-content nav nav-list collapse <?php if($block=='principal'){echo 'in';} ?>" id="accIndex">
                        <li <?php if($page=='principal'){echo 'class="active"';}?> > <a href="index.php"> <i class="fontello-icon-right-dir"></i> <span class="hidden-tablet">Pagina</span> principal </a> </li>        
                    </ul>
                </li>
                <!-- // item accordionMenu index -->
                <li class="accordion-group">
                    <div class="accordion-heading <?php if($block=='events'){echo 'active';}?>"> <a href="#accEvent" data-parent="#mainSideMenu" data-toggle="collapse" class="accordion-toggle"> <span class="item-icon fontello-icon-calendar-1"></span><i class="chevron fontello-icon-right-open-3"></i> Eventos </a> </div>
                    <ul class="accordion-content nav nav-list collapse <?php if($block=='events'){echo 'in';}?>" id="accEvent">
                        <li <?php if($page=='eventos'){echo 'class="active"';}?> > <a href="Eventos.php"> <i class=" fontello-icon-table"></i> Lista de Eventos </a> </li>
                        <li <?php if($page=='creareven'){echo 'class="active"';}?> > <a href="crearEvento.php"> <i class="fontello-icon-check"></i> Agregar nuevo evento </a> </li>
                    </ul>
                </li>
                <!-- // item accordionMenu doctores -->
                <li class="accordion-group">
                    <div class="accordion-heading <?php if($block=='paciente'){echo 'active';} ?>"> <a href="#accPaciente" data-parent="#mainSideMenu" data-toggle="collapse" class="accordion-toggle"> <span class="item-icon fontello-icon-ticket"></span> <i class="chevron fontello-icon-right-open-3"></i> Articulos </a> </div>
                    <ul class="accordion-content nav nav-list collapse <?php if($block=='paciente'){echo 'in';} ?>" id="accPaciente">
                        <li <?php if($page=='pacientes'){echo 'class="active"';}?> > <a href="pacientes.php"> <i class=" fontello-icon-table"></i> Lista de articulos </a> </li>
                        <li <?php if($page=='crearpaciente'){echo 'class="active"';}?> > <a href="crearPaciente.php"> <i class="fontello-icon-plus-circle"></i> Agregar nuevo articulo </a> </li>
                    </ul>
                </li>
                <!-- // item accordionMenu pacientes -->
                <li class="accordion-group">
                    <div class="accordion-heading <?php if($block=='actividad'){echo 'active';} ?>"> <a href="#accConsulta" data-parent="#mainSideMenu" data-toggle="collapse" class="accordion-toggle"> <span class="item-icon  fontello-icon-picture"></span> <i class="chevron fontello-icon-right-open-3"></i> Galeria </a> </div>
                    <ul class="accordion-content nav nav-list collapse <?php if($block=='actividad'){echo 'in';} ?>" id="accConsulta">
                        <li <?php if($page=='actividades'){echo 'class="active"';}?> > <a href="consulta.php"> <i class=" fontello-icon-table"></i> Lista de fotos </a> </li>
                        <li <?php if($page=='crearactividad'){echo 'class="active"';}?> > <a href="crearConsulta.php"> <i class="fontello-icon-camera"></i>Agregar nueva foto </a> </li>
                    </ul>
                </li>
                <!-- // item accordionMenu consulta -->
                <li class="accordion-group">
                    <div class="accordion-heading <?php if($block=='prueba'){echo 'active';} ?>"> <a href="#accPrueba" data-parent="#mainSideMenu" data-toggle="collapse" class="accordion-toggle"> <span class="item-icon fontello-icon-cd-2"></span> <i class="chevron fontello-icon-right-open-3"></i> Canciones </a> </div>
                    <ul class="accordion-content nav nav-list collapse <?php if($block=='prueba'){echo 'in';} ?>" id="accPrueba">
                        <li <?php if($page=='listaprueba'){echo 'class="active"';}?> > <a href="pruebas.php"> <i class="fontello-icon-ipod"></i> Lista de canciones </a> </li>
                        <li <?php if($page=='crearprueba'){echo 'class="active"';}?> > <a href="crearPrueba.php"> <i class="fontello-icon-music-alt"></i> Añadir cancion </a> </li>
                    </ul>
                </li>
                <li class="accordion-group">
                    <div class="accordion-heading <?php if($block=='import'){echo 'active';} ?>"> <a href="#accImport" data-parent="#mainSideMefontello-icon-ipodnu" data-toggle="collapse" class="accordion-toggle"> <span class="item-icon fontello-icon-cinema"></span> <i class="chevron fontello-icon-right-open-3"></i> Videos propios </a> </div>
                    <ul class="accordion-content nav nav-list collapse <?php if($block=='import'){echo 'in';} ?>" id="accImport">
                        <li <?php if($page=='nuevoimport'){echo 'class="active"';}?> > <a href="importacion.php"> <i class="fontello-icon-th-list-3"></i> links </a> </li>
                        <li <?php if($page=='nuevoimport'){echo 'class="active"';}?> > <a href="importacion.php"> <i class="fontello-icon-link"></i> Nuevo link </a> </li>
                    </ul>
                </li>
                <li class="accordion-group">
                    <div class="accordion-heading <?php if($block=='prueba'){echo 'active';} ?>"> <a href="#viInte" data-parent="#mainSideMenu" data-toggle="collapse" class="accordion-toggle"> <span class="item-icon fontello-icon-video"></span> <i class="chevron fontello-icon-right-open-3"></i> Videos de interes </a> </div>
                    <ul class="accordion-content nav nav-list collapse <?php if($block=='prueba'){echo 'in';} ?>" id="viInte">
                        <li <?php if($page=='listaprueba'){echo 'class="active"';}?> > <a href="pruebas.php"> <i class="fontello-icon-th-list-3"></i> Links </a> </li>
                        <li <?php if($page=='crearprueba'){echo 'class="active"';}?> > <a href="crearPrueba.php"> <i class="fontello-icon-link"></i> Nuevo Link </a> </li>
                    </ul>
                </li>
                <!-- // item accordionMenu import-->
            </ul>
            <!-- // sidebar menu -->
            
            <div class="sidebar-item"></div>
            <!-- // sidebar item --> 
            
        </div>
        <!-- // sidebar -->