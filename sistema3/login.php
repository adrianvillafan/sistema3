<?php
require_once 'controller/usuario.controller.php';
$usuario = new UsuarioController();
$resultado="";

//verificar si ya se ha iniciado sesion anteriormente
if($usuario->Verificar_InicioSesion()==TRUE)
{
  $usuario->redirect('index.php');

}else{
  // verificar si se ha presionado el boton submit del formulario.
  if(isset($_POST['btn-ingresar']))
  {
    //almacenamos los datos enviados del formulario;
    $Login = $_POST['Usuario'];
    $Password = $_POST['Password'];    
    //verificar si existe el usuario y la contraseña
    if($usuario->Iniciar_Sesion($Login,$Password))
    {
      //si existe redireccionar al index.php
      $usuario->redirect('index.php');
    }
    else
    { 
      //si no existe mostrar el siguiente mensaje   
     $resultado = "Usuario o Contraseña Incorrecta";
    } 
  }  
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iniciar Sesión</title>
    <link rel="shortcut icon" href="assets/dist/img/icono.png"> 
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">        
        <img src="assets/dist/img/logo.svg" alt="" style="width: 220px;">
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Ingresa tus datos</p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="Usuario" placeholder="Usuario">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="Password" placeholder="Contraseña">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label for="" class="text-danger"><?php echo $resultado; ?></label>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-default btn-block btn-flat" name="btn-ingresar" style="background-color: #2560a4;color: #eeeeee;"><b><i class="fa fa-sign-in" aria-hidden="true"></i> Iniciar Sesión</b></button>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->



    <!-- jQuery 2.1.4 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   
  </body>
</html>
