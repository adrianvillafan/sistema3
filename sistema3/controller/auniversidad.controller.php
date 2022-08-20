<?php
require_once 'model/auniversidad.model.php';
require_once 'entity/auniversidad.entity.php';
require_once 'includes.controller.php';

class AuniversidadController extends IncludesController{    
  
    private $model;
    
    public function __CONSTRUCT()
    {
        $this->model = new AuniversidadModel();
    }
    /**==========================Vistas=======================================*/
    public function Index(){        
        require_once 'view/header.php';
        require_once 'view/administracion/auniversidad/index.php';
        require_once 'view/footer.php';       
    }

    public function v_Actualizar(){        
        require_once 'view/header.php';
        require_once 'view/administracion/auniversidad/actualizar.php';
        require_once 'view/footer.php';       
    }

    public function v_Registrar(){        
        require_once 'view/header.php';
        require_once 'view/administracion/auniversidad/registrar.php';
        require_once 'view/footer.php';       
    }


    /**=======================================================================*/   
    public function Listar()
    {
        $auniversidads = $this->model->Listar();
        return $auniversidads;
    }




    public function Consultar($idAuniversidad)
    {
        $auniversidad = new Auniversidad();
        $auniversidad->__SET('idAuniversidad',$idAuniversidad);

        $consulta = $this->model->Consultar($auniversidad);
        return $consulta;
    }

    public function Actualizar(){
        $auniversidad = new Auniversidad();
        $auniversidad->__SET('idAuniversidad',$_REQUEST['idAuniversidad']);
        $auniversidad->__SET('codigo',$_REQUEST['codigo']);
        $auniversidad->__SET('nombre',$_REQUEST['nombre']);
        $auniversidad->__SET('direccion',$_REQUEST['direccion']);
        $auniversidad->__SET('licenciado',$_REQUEST['licenciado']);
        $auniversidad->__SET('cantidad_carreras',$_REQUEST['cantidad_carreras']);
        $auniversidad->__SET('modificado_por',$_SESSION['Usuario_Actual']);
        $auniversidad->__SET('activo',$_REQUEST['activo']);
        $auniversidad->__SET('eliminado',$_REQUEST['eliminado']);  
              
        $actualizar_Auniversidad = $this->model->Actualizar($auniversidad);         
        if($actualizar_Auniversidad=='error'){
            header('Location: index.php?c=Auniversidad&a=v_Actualizar&idAuniversidad='. $auniversidad->__GET('idAuniversidad'));
            echo 'No se Ha Podido Actualizar';
        }else{
            echo 'Actualizado Correctamente';
            header('Location: index.php?c=Auniversidad');
         }
    }
    


    public function Registrar(){

        $auniversidad = new Auniversidad();
        $auniversidad->__SET('idAuniversidad',$_REQUEST['idAuniversidad']);
        $auniversidad->__SET('codigo',$_REQUEST['codigo']);
        $auniversidad->__SET('nombre',$_REQUEST['nombre']);
        $auniversidad->__SET('direccion',$_REQUEST['direccion']);
        $auniversidad->__SET('licenciado',$_REQUEST['licenciado']);
        $auniversidad->__SET('cantidad_carreras',$_REQUEST['cantidad_carreras']);
        $auniversidad->__SET('ingresado_por',$_SESSION['Usuario_Actual']); 
        $auniversidad->__SET('activo',$_REQUEST['activo']);
        $auniversidad->__SET('eliminado',$_REQUEST['eliminado']); 
        //$auniversidad->__SET('foto',$_REQUEST['foto']);

           
        /*Validar Documento / Si no existe Registrar / Mostrar un mensaje que indique que el dni ya fue registrado*/
        $registrar_auniversidad = $this->model->Registrar($auniversidad);  
         //echo $registrar_Auniversidad;
        if($registrar_auniversidad=='error'){
            header('Location: index.php?c=Auniversidad&a=v_Registrar');
            echo 'No se Ha Podido Registrar';
         }else{
            echo 'Registrado Correctamente';
            header('Location: index.php?c=Auniversidad');
         }
    }

    public function Eliminar(){
        $auniversidad = new Auniversidad();
        $auniversidad->__SET('idAuniversidad',$_REQUEST['idAuniversidad']);      
        $auniversidad->__SET('modificado_por',$_SESSION['Usuario_Actual']);
        $auniversidad->__SET('eliminado',1); 
        $eliminar_auniversidad = $this->model->Eliminar($auniversidad);  
         
        if($eliminar_auniversidad=='error'){
            echo 'No se Ha Podido Eliminar la Auniversidad';
            header('Location: index.php?c=Auniversidad');            
        }else{
            echo 'Origen Eliminado Correctamente';
            header('Location: index.php?c=Auniversidad');
        }
    }


    public function redirect($url)
    {
        header("Location: $url");
    }   

}