<?php
require_once 'model/usuario.model.php';
require_once 'entity/usuario.entity.php';
require_once 'includes.controller.php';
//ini_set("session.cookie_lifetime","216000");
//ini_set("session.gc_maxlifetime","216000");
session_start();
class UsuarioController extends IncludesController{    
  
    private $model;
    
    public function __CONSTRUCT()
    {
        $this->model = new UsuarioModel();
    }
    /**==========================Vistas=======================================*/

    public function validarPermiso ($idPerfil = 0,$idVista=0){

      try
        {
             ini_set('memory_limit', -1); 
        $this->pdo = new Conexion();
            $result = array();

            $stm = $this->pdo->prepare("SELECT acceder     FROM Permiso
                WHERE Vista_id = $idVista
                AND Perfil_id=$idPerfil");
            $stm->execute();
                   
            return $stm->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }

  }



    public function Index(){
        $permiso=$this->validarPermiso($_SESSION['Perfil_Actual'],1);
     
        if($permiso['acceder']==1){         
      
            require_once 'view/header.php';
            require_once 'view/seguridad/usuario/index.php';
            require_once 'view/footer.php';       
        }else{
          header('Location: index.php?c=index&a=denegado');
        }

           
    }

    public function v_Actualizar(){        
        
        $permiso=$this->validarPermiso($_SESSION['Perfil_Actual'],1);
        if($permiso['acceder']==1){      
            require_once 'view/header.php';
            require_once 'view/seguridad/usuario/actualizar.php';
            require_once 'view/footer.php';       
        }else{
          header('Location: index.php?c=index&a=denegado');
        }
        
    }

    public function v_Registrar(){        
        require_once 'view/header.php';
        require_once 'view/seguridad/usuario/registrar.php';
        require_once 'view/footer.php';       
    }
    /**=======================================================================*/   
    public function Listar()
    {

        $usuarios = $this->model->Listar();
        return $usuarios;
    }


    public function Consultar_informacion_usuario($idUsuario)
    {
        $usuario = $this->model->Consultar_informacion_usuario($idUsuario);
        return $usuario;
    }

    public function Consultar($idUsuario)
    {
        $usuario = new Usuario();
        $usuario->__SET('idUsuario',$idUsuario);

        $consulta = $this->model->Consultar($usuario);
        return $consulta;
    }

    public function Actualizar(){
        $usuario = new Usuario();
        $usuario->__SET('idUsuario',$_REQUEST['idUsuario']);
        $usuario->__SET('login',$_REQUEST['login']);
        $usuario->__SET('password',$_REQUEST['password']);
        $usuario->__SET('Perfil_id',$_REQUEST['Perfil_id']);         
        $usuario->__SET('modificado_por',$_SESSION['Usuario_Actual']);
        $usuario->__SET('activo',$_REQUEST['activo']);       
        $actualizar_usuario = $this->model->actualizar($usuario);  
         
        if($actualizar_usuario=='error'){
            header('Location: index.php?c=Usuario&a=v_Actualizar&idUsuario='. $usuario->__GET('idUsuario'));
            echo 'No se Ha Podido Actualizar el Usuario';
         }else{
            echo 'Usuario Actualizado Correctamente';
            header('Location: index.php?c=Usuario');
         }
    }

    public function Registrar(){
        $usuario = new Usuario();       
        $usuario->__SET('login',$_REQUEST['login']);
        $usuario->__SET('password',$_REQUEST['password']);
        $usuario->__SET('Perfil_id',$_REQUEST['Perfil_id']);
        $usuario->__SET('Persona_id',$_REQUEST['Persona_id']);       
        $usuario->__SET('ingresado_por',$_SESSION['Usuario_Actual']);
        $registrar_usuario = $this->model->registrar($usuario);  
         
        if($registrar_usuario=='error'){
            header('Location: index.php?c=Usuario&a=v_Registrar');
            echo 'No se Ha Podido Registrar al Usuario';
         }else{
            echo 'Usuario Registrado Correctamente';
            header('Location: index.php?c=Usuario');
         }
    }

    public function Eliminar(){
        $usuario = new Usuario();
        $usuario->__SET('idUsuario',$_REQUEST['idUsuario']);      
        $usuario->__SET('modificado_por',$_SESSION['Usuario_Actual']);
        $usuario->__SET('eliminado',1); 
        $eliminar_usuario = $this->model->eliminar($usuario);  
         
        if($eliminar_usuario=='error'){
            header('Location: index.php?c=Usuario');
            echo 'No se Ha Podido Eliminar el Usuario';
         }else{
            echo 'Usuario Eliminar Correctamente';
            header('Location: index.php?c=Usuario');
         }
    }


     /**============================Login===========================================*/  

    public function Iniciar_Sesion($Login,$Password)
    {        
        //instanciamos ala entidad usuario.
        $usuario = new Usuario();
        //asignamos valores a las variables de la entidad
        $usuario->__SET('login',$Login);
        $usuario->__SET('password',$Password);
        //validamos al usuario en el clase modelo del usuario
        $usuario_registrado = $this->model->Validar_Usuario($usuario);
         
         //validamos que el resultado de la validacion sea diferente a FALSE
        if(!$usuario_registrado==FALSE){
            //creamos variables de session del idUsuario y el perfil
            $_SESSION['Usuario_Actual'] = $usuario_registrado['idUsuario'];
            $_SESSION['Tipo_sistema'] = 'Prejudicial';
            $_SESSION['Perfil_Actual'] = $usuario_registrado['Perfil_id'];
            $_SESSION['Persona_Actual'] = $usuario_registrado['Persona_id'];
            //confirmamos que el usuario y la contraseña son correctas
            return TRUE;
        }else{
             //confirmamos que el usuario y la contraseña son incorrectas
             return FALSE;
        }
                               
    }

    public function Verificar_InicioSesion()
    {
        //verifico si la session a sido iniciada
        if(isset($_SESSION['Usuario_Actual']) && isset($_SESSION['Tipo_sistema'])=="Prejudicial")
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }



    
    public function redirect($url)
    {
        header("Location: $url");
    }    
  
    public function CerrarSesion(){
        session_destroy();
        unset($_SESSION['Usuario_Actual']);     
        header('Location: login.php');           
       
    }
    

}