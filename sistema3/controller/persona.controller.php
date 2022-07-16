<?php
require_once 'model/persona.model.php';
require_once 'entity/persona.entity.php';
require_once 'includes.controller.php';

class PersonaController extends IncludesController{    
  
    private $model;
    
    public function __CONSTRUCT()
    {
        $this->model = new PersonaModel();
    }
    /**==========================Vistas=======================================*/
    public function Index(){        
        require_once 'view/header.php';
        require_once 'view/administracion/persona/index.php';
        require_once 'view/footer.php';       
    }

    public function v_Actualizar(){        
        require_once 'view/header.php';
        require_once 'view/administracion/persona/actualizar.php';
        require_once 'view/footer.php';       
    }

    public function v_Registrar(){        
        require_once 'view/header.php';
        require_once 'view/administracion/persona/registrar.php';
        require_once 'view/footer.php';       
    }


    /**=======================================================================*/   
    public function Listar()
    {
        $personas = $this->model->Listar();
        return $personas;
    }


    public function ListarPersonalTI()
    {
        $personas = $this->model->ListarPersonalTI();
        return $personas;
    }


    public function Consultar($idPersona)
    {
        $persona = new Persona();
        $persona->__SET('idPersona',$idPersona);

        $consulta = $this->model->Consultar($persona);
        return $consulta;
    }

    public function Actualizar(){
        $persona = new Persona();
        $persona->__SET('idPersona',$_REQUEST['idPersona']);
        $persona->__SET('primer_nombre',$_REQUEST['primer_nombre']);
        $persona->__SET('segundo_nombre',$_REQUEST['segundo_nombre']);
        $persona->__SET('apellido_paterno',$_REQUEST['apellido_paterno']);
        $persona->__SET('apellido_materno',$_REQUEST['apellido_materno']);
        $persona->__SET('fecha_nacimiento',$_REQUEST['fecha_nacimiento']);
        $persona->__SET('sexo',$_REQUEST['sexo']);
        $persona->__SET('celular',$_REQUEST['celular']);
        $persona->__SET('tipo_horario',$_REQUEST['tipo_horario']);
        $persona->__SET('horario_entrada',$_REQUEST['horario_entrada']);
        $persona->__SET('horario_salida',$_REQUEST['horario_salida']);
        $persona->__SET('correo',$_REQUEST['correo']);
        $persona->__SET('fecha_salida',$_REQUEST['fecha_salida']);
        $persona->__SET('activo',$_REQUEST['activo']);                  
        $persona->__SET('modificado_por',$_SESSION['Usuario_Actual']);      
        $actualizar_persona = $this->model->Actualizar($persona);         
        if($actualizar_persona=='error'){
            header('Location: index.php?c=Persona&a=v_Actualizar&idPersona='. $persona->__GET('idPersona'));
            echo 'No se Ha Podido Actualizar';
        }else{
            echo 'Actualizado Correctamente';
            header('Location: index.php?c=Persona');
         }
    }
    


    public function Registrar(){
        
        $persona = new Persona();
        $nropersona = $this->model->Consultar_persona_dia($_REQUEST['fecha_ingreso']);
        $date=date_create($_REQUEST['fecha_ingreso']);
        $cod_fecha=date_format($date,'ymd');
        if(strlen($nropersona)==1){
            $cod_dia="0".$nropersona;
        }else{
            $cod_dia=$nropersona;
        }

        $codigo=$cod_fecha.$cod_dia;
        $persona->__SET('primer_nombre',$_REQUEST['primer_nombre']);
        $persona->__SET('segundo_nombre',$_REQUEST['segundo_nombre']);
        $persona->__SET('apellido_paterno',$_REQUEST['apellido_paterno']);
        $persona->__SET('apellido_materno',$_REQUEST['apellido_materno']);
        $persona->__SET('dni',$_REQUEST['dni']);
        $persona->__SET('codigo',$codigo);
        $persona->__SET('celular',$_REQUEST['celular']);
        $persona->__SET('fecha_ingreso',$_REQUEST['fecha_ingreso']);
        $persona->__SET('fecha_nacimiento',$_REQUEST['fecha_nacimiento']);
        $persona->__SET('sexo',$_REQUEST['sexo']);
        $persona->__SET('tipo_horario',$_REQUEST['tipo_horario']);
        $persona->__SET('horario_entrada',$_REQUEST['horario_entrada']);
        $persona->__SET('horario_salida',$_REQUEST['horario_salida']);
        $persona->__SET('correo',$_REQUEST['correo']);
        //$persona->__SET('foto',$_REQUEST['foto']);

        $persona->__SET('ingresado_por',$_SESSION['Usuario_Actual']);    
        /*Validar Documento / Si no existe Registrar / Mostrar un mensaje que indique que el dni ya fue registrado*/
        $registrar_persona = $this->model->Registrar($persona);  
         //echo $registrar_persona;
        if($registrar_persona=='error'){
            header('Location: index.php?c=Persona&a=v_Registrar');
            echo 'No se Ha Podido Registrar';
         }else{
            echo 'Registrado Correctamente';
            header('Location: index.php?c=Persona');
         }
    }

    public function Eliminar(){
        $persona = new Persona();
        $persona->__SET('idPersona',$_REQUEST['idPersona']);      
        $persona->__SET('modificado_por',$_SESSION['Usuario_Actual']);
        $persona->__SET('eliminado',1); 
        $eliminar_persona = $this->model->Eliminar($persona);  
         
        if($eliminar_persona=='error'){
            echo 'No se Ha Podido Eliminar la Persona';
            header('Location: index.php?c=Persona');            
        }else{
            echo 'Origen Eliminado Correctamente';
            header('Location: index.php?c=Persona');
        }
    }


    public function redirect($url)
    {
        header("Location: $url");
    }   

}