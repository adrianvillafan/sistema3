<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
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
      </div>
      <div class="pull-left info">
        <p><?php echo $info_Persona['primer_nombre'].' '.$info_Persona['apellido_paterno']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <?php if ($_SESSION['Perfil_Actual'] = 1): ?>
      <ul class="sidebar-menu"> 
      <li class="header">Menú de Navegacion</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-book" aria-hidden="true"></i>
          <span>ADMINISTRACION</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">                
          <li>
            <li><a href="index.php?c=Persona"><i class="fa fa-circle-o" aria-hidden="true"></i> Persona</a></li>
          </li>
          <li>
            <li><a href="index.php?c=Curso"><i class="fa fa-circle-o" aria-hidden="true"></i> Curso</a></li>
          </li>
        </ul>
      </li>
    </ul>

    <?php else: ?>

    <ul class="sidebar-menu"> 
      <li class="header">Menú de Navegacion</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-book" aria-hidden="true"></i>
          <span>ADMINISTRACION</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">                
          <li>
            <li><a href="index.php?c=Persona"><i class="fa fa-circle-o" aria-hidden="true"></i> Persona</a></li>
          </li>
          <li>
            <li><a href="index.php?c=Curso"><i class="fa fa-circle-o" aria-hidden="true"></i> Curso</a></li>
          </li>
        </ul>
      </li>
    </ul>
    <?php endif ?>
  </section>
  <!-- /.sidebar -->
</aside>