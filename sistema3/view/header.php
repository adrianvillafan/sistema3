<!DOCTYPE html>

<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema - Software</title>
    <link rel="shortcut icon" href="<?php echo RUTA_HTTP; ?>/assets/dist/img/icono.svg"> 
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo RUTA_HTTP; ?>/assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo RUTA_HTTP; ?>/assets/fonts/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo RUTA_HTTP; ?>/assets/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo RUTA_HTTP; ?>/assets/dist/css/skins/_all-skins.css">

       <!-- jQuery 2.1.4 -->
    <script src="<?php echo RUTA_HTTP; ?>/assets/plugins/jQuery/jquery-1.12.0.min.js"></script>
  <!-- datatables -->
    <link rel="stylesheet" href="<?php echo RUTA_HTTP; ?>/assets/plugins/datatables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo RUTA_HTTP; ?>/assets/plugins/datatables/extensions/FixedColumns/css/dataTables.fixedColumns.min.css">

    <!-- highcharts -->
  
    <script src="<?php echo RUTA_HTTP; ?>/assets/plugins/highcharts/js/highcharts.js"></script>
    <script src="<?php echo RUTA_HTTP; ?>/assets/plugins/highcharts/js/highcharts-more.js"></script>
    <script src="<?php echo RUTA_HTTP; ?>/assets/plugins/highcharts/js/modules/data.js"></script>
    <script src="<?php echo RUTA_HTTP; ?>/assets/plugins/highcharts/js/modules/exporting.js"></script>
    <!-- bootstrap validator -->
    <script src="<?php echo RUTA_HTTP; ?>/assets/bootstrap/js/bootstrapValidator.js" type="text/javascript"></script>
    <script src="<?php echo RUTA_HTTP; ?>/assets/bootstrap/js/bootstrapv.min.js" type="text/javascript"></script>

    <!-- app -->
    <script src="<?php echo RUTA_HTTP; ?>/assets/js/app.js"></script>
    <!-- tabletojson -->
    <script src="<?php echo RUTA_HTTP; ?>/assets/dist/js/jquery.tabletojson.min.js"></script>
    <script src="<?php echo RUTA_HTTP; ?>/assets/dist/js/bootbox.min.js" type="text/javascript"></script>
    <!-- jquery-ui-timepicker -->
    <link rel="stylesheet" media="all" type="text/css" href="<?php echo RUTA_HTTP; ?>/assets/plugins/jQuery-Timepicker/css/jquery-ui.css" />
    <link rel="stylesheet" media="all" type="text/css" href="<?php echo RUTA_HTTP; ?>/assets/plugins/jQuery-Timepicker/css/jquery-ui-timepicker-addon.css" />

    <!-- style Sistema -->
     <link rel="stylesheet" href="<?php echo RUTA_HTTP; ?>/assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 <?php 
  $UsuarioSession = new UsuarioController();
  $info_Persona=$UsuarioSession->Consultar_informacion_usuario($_SESSION['Usuario_Actual']);
                        
  
 ?>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Sistema</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Sistema</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
<!--------------------------- Navbar Right Menu ----------------------------------------------------------->
         
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
<!------------------------------------------------------------------------------------------------------------>
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                 <?php 
                    $fotoPerfil = RUTA_HTTP.'/uploads/fotos_perfil/'.$info_Persona['login'].'.jpg';
                    //Compruebo si existe la foto
                    if (@getimagesize($fotoPerfil)) {
                      $fotoPerfil=$fotoPerfil;
                    } else {
                      $fotoPerfil = RUTA_HTTP.'/assets/dist/img/user-'.$info_Persona['sexo'].'.png';
                    }
                  ?>
                  <img src="<?php echo $fotoPerfil; ?>"  class="user-image" alt="User Image">

                  <span class="hidden-xs"><?php echo $info_Persona['primer_nombre'].' '.$info_Persona['apellido_paterno'] ?></span>
                </a>

<!------------------Menu desplegable----------------------------------------------------------->
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                     <?php 
                        $fotoPerfil = RUTA_HTTP.'/uploads/fotos_perfil/'.$info_Persona['login'].'.jpg';
                        //Compruebo si existe la foto
                        if (@getimagesize($fotoPerfil)) {
                          $fotoPerfil=$fotoPerfil;
                        } else {
                          $fotoPerfil = RUTA_HTTP.'/assets/dist/img/user-'.$info_Persona['sexo'].'.png';
                        }
                      ?>
                      <img src="<?php echo $fotoPerfil; ?>"  class="img-circle" alt="User Image">
                    <p>
                      <?php echo $info_Persona['primer_nombre'].' '.$info_Persona['apellido_paterno']?>
                      <small><?php echo $info_Persona['perfil']; ?></small>                     
                      
                    </p>
                  </li>
                  <!-- Menu Body -->
                
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="index.php?c=Usuario&a=CerrarSesion" class="btn btn-default btn-flat"> <b><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesión </b></a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
              
              </li>
            </ul>
          </div>

        </nav>
      </header>      
    <?php include('sidebar.php'); ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">