<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SpartaX - Software Contact Center</title>    
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
 
   <body class="hold-transition skin-red layout-top-nav">
    <div class="wrapper" >

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="index.php" class="navbar-brand"><b>Sparta</b>X</a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="">
                  <a href="index.php?c=Gestion&a=Obligaciones">Obligaciones </a>
                </li>
                <li class="dropdown">
                  <a href="index.php?c=Gestion&a=ConsultarObligacion" target="_blank">Consultas </a>
                </li>
                <li class="dropdown">
                  <a href="index.php?c=Procesos&a=BusquedaIndividual" target="_blank">Busquedas </a>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->

                <!-------------------- Messages: style can be found in dropdown.less-------------------------------------->
              <?php if ($info_Persona['idPerfil']!=9): ?>

              <?php 
              $dia_gestion=Date('Y-m-d');
              $Ejecutivos_gestionando=$this->ConsultasbdLectura("SELECT gestion.Gestor_id,persona.codigo as Codigo,CONCAT(primer_nombre,' ',apellido_paterno,' ',apellido_materno) as Persona,persona.sexo
,count(idGestion) as NroLlamadas,sum(resultado.VALIDO) as LlamadasValidas,sum(contactabilidad.cd) as CtoDirecto
,sum(resultado.pp) as NroPromesas, min(Hora_Inicio) as HoraInicio,max(Hora_fin) as HoraFin FROM gestion
inner join resultado on resultado.idResultado=gestion.Resultado_id
inner join contactabilidad on contactabilidad.idContactabilidad=resultado.Contactabilidad_id
LEFT JOIN persona ON persona.idPersona=gestion.gestor_id
where gestion.fecha_gestion='".$dia_gestion."' and gestion.eliminado=0 and persona.Cargo_id=1
group by gestion.Gestor_id order by HoraFin asc");  ?>

              <li class="dropdown messages-menu">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                  <span class="label label-success"><?php echo count($Ejecutivos_gestionando); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Ejecutivos que dejaron dejaron de gestionar por más de 10 minutos  </li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu" id="EjecutivosSinGestion">
                      <?php $contador=0; ?>
                      <?php foreach ($Ejecutivos_gestionando as $item): ?>

                       
                      <?php $Data_asistencia=$this->consultar_row("SELECT * FROM tiempoimproductivo where Persona_id=".$item['Gestor_id']." and FechaGestion='".$dia_gestion."'") ?>
                      <?php $Data=$this->ConsultasbdLectura("SELECT * FROM tiempoimproductivo where Persona_id=".$item['Gestor_id']." and FechaGestion='".$dia_gestion."'") ?>
                      

                      <?php
                      $Ultima_reunion['Tipo_Descanso']=0;
                      $Ultima_reunion['Estado']=0; 
                       ?>

                      <?php foreach ($Data as $row): ?> 
                      <?php
                      $Ultima_reunion['Tipo_Descanso']=$row['Tipo_Descanso'];
                      $Ultima_reunion['Estado']=$row['Estado'];
                      ?>
                      <?php endforeach ?>
                      



                         <?php $DataAsistAsesor=$this->consultar_row("SELECT * FROM tiempoimproductivo where Persona_id=".$item['Gestor_id']." and FechaGestion='".$dia_gestion."'") ?>

                        <?php $HoraActual = strtotime( date("H:i:s"));
                              $HoraFinGest = strtotime($item['HoraFin']);
                              $MinutosGestion=round(($HoraActual-$HoraFinGest) / 60);
                              $contador++;
                       ?>
                        <?php if ($MinutosGestion>=10): ?>
                          
                        
                        <li><!-- start message -->
                          <a href="#">                                  
                            <div class="pull-left">
                              <?php 
                                $fotoPerfil = RUTA_HTTP.'/uploads/fotos_perfil/'.$item['Codigo'].'.jpeg';
                                //Compruebo si existe la foto
                                if (@getimagesize($fotoPerfil)) {
                                  $fotoPerfil=$fotoPerfil;
                                } else {
                                  $fotoPerfil = RUTA_HTTP.'/assets/dist/img/user-'.$item['sexo'].'.png';
                                }
                              ?>
                              <img src="<?php echo $fotoPerfil; ?>"  class="img-circle" alt="User Image">
                            </div>
                                

                            <h4><?php echo $item['Persona'];?></h4>
                            <p><small><i class="fa fa-clock-o"></i> <?php echo $MinutosGestion; ?> minutos sin registrar gestión</small></p>
                            <p><small>

                              
                               <?php if ($Ultima_reunion['Estado']==0): ?> 
                      <td><?php echo $this->SemaforoEstadoGestionAsesor($Data_asistencia['Estado'],$Ultima_reunion['Tipo_Descanso']); ?> </td>
                      <?php else: ?>
                      <td><?php echo $this->SemaforoEstadoGestionAsesor($Ultima_reunion['Estado'],$Ultima_reunion['Tipo_Descanso']); ?> </td>
                      <?php endif ?> 


                              </small> </p>
                          </a>
                        </li><!-- end message -->
                        <?php endif ?>
                      <?php endforeach ?>

                      
                    </ul>
                  </li>
                  <li class="footer"><a href="index.php?c=Gestion&a=IndGestDiaxAsesor">Ver más detalles</a></li>
                </ul>
              </li>
              
              
              <?php endif ?>
<!------------------------------------------------------------------------------------------------------------>
                  <!-- User Account Menu -->
                 <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                 <?php 
                    $fotoPerfil = RUTA_HTTP.'/uploads/fotos_perfil/'.$info_Persona['codigo'].'.jpeg';
                    //Compruebo si existe la foto
                    if (@getimagesize($fotoPerfil)) {
                      $fotoPerfil=$fotoPerfil;
                    } else {
                      $fotoPerfil = RUTA_HTTP.'/assets/dist/img/user-'.$info_Persona['sexo'].'.png';
                    }
                  ?>
                  <img src="<?php echo $fotoPerfil; ?>"  class="user-image" alt="User Image">

                  <span class="hidden-xs"><?php echo $info_Persona['primer_nombre'].' '.$info_Persona['apellido_paterno'].' '.$info_Persona['apellido_materno'] ?></span>
                </a>

<!------------------Menu desplegable----------------------------------------------------------->
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                     <?php 
                        $fotoPerfil = RUTA_HTTP.'/uploads/fotos_perfil/'.$info_Persona['codigo'].'.jpeg';
                        //Compruebo si existe la foto
                        if (@getimagesize($fotoPerfil)) {
                          $fotoPerfil=$fotoPerfil;
                        } else {
                          $fotoPerfil = RUTA_HTTP.'/assets/dist/img/user-'.$info_Persona['sexo'].'.png';
                        }
                      ?>
                      <img src="<?php echo $fotoPerfil; ?>"  class="img-circle" alt="User Image">
                    <p>
                      <?php echo $info_Persona['primer_nombre'].' '.$info_Persona['apellido_paterno'].' '.$info_Persona['apellido_materno'] ?>
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




                  
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
       <!-- Full Width Column -->
      <div class="content-wrapper">