<?php
require_once 'model/alumno.model.php';
require_once 'entity/alumno.entity.php';
require_once 'includes.controller.php';

class AlumnoController extends IncludesController{    
  
    private $model;
    
    public function __CONSTRUCT()
    {
        $this->model = new AlumnoModel();
    }
    /**==========================Vistas=======================================*/
    public function Index(){        
        require_once 'view/header.php';
        require_once 'view/administracion/alumno/index.php';
        require_once 'view/footer.php';       
    }

    public function v_Actualizar(){        
        require_once 'view/header.php';
        require_once 'view/administracion/alumno/actualizar.php';
        require_once 'view/footer.php';       
    }

    public function v_Registrar(){        
        require_once 'view/header.php';
        require_once 'view/administracion/alumno/registrar.php';
        require_once 'view/footer.php';       
    }


    /**=======================================================================*/   
    public function Listar()
    {
        $alumnos = $this->model->Listar();
        return $alumnos;
    }




    public function Consultar($idAlumno)
    {
        $alumno = new Alumno();
        $alumno->__SET('idAlumno',$idAlumno);

        $consulta = $this->model->Consultar($alumno);
        return $consulta;
    }

    public function Actualizar(){
        $alumno = new Alumno();
        $alumno->__SET('idAlumno',$_REQUEST['idAlumno']);
        $alumno->__SET('primer_nombre',$_REQUEST['primer_nombre']);
        $alumno->__SET('apellido_paterno',$_REQUEST['apellido_paterno']);
        $alumno->__SET('apellido_materno',$_REQUEST['apellido_materno']);
        $alumno->__SET('edad',$_REQUEST['edad']);
        $alumno->__SET('dni',$_REQUEST['dni']);
        $alumno->__SET('fecha_nacimiento',$_REQUEST['fecha_nacimiento']);
        $alumno->__SET('curso',$_REQUEST['curso']);
        $alumno->__SET('carrera',$_REQUEST['carrera']);
        $alumno->__SET('activo',$_REQUEST['activo']);  
        $alumno->__SET('modificado_por',$_SESSION['Usuario_Actual']);      
        $actualizar_Alumno = $this->model->Actualizar($alumno);         
        if($actualizar_Alumno=='error'){
            header('Location: index.php?c=Alumno&a=v_Actualizar&idAlumno='. $alumno->__GET('idAlumno'));
            echo 'No se Ha Podido Actualizar';
        }else{
            echo 'Actualizado Correctamente';
            header('Location: index.php?c=Alumno');
         }
    }
    


    public function Registrar(){

        $alumno = new Alumno();

        $alumno->__SET('primer_nombre',$_REQUEST['primer_nombre']);
        $alumno->__SET('apellido_paterno',$_REQUEST['apellido_paterno']);
        $alumno->__SET('apellido_materno',$_REQUEST['apellido_materno']);
        $alumno->__SET('edad',$_REQUEST['edad']);
        $alumno->__SET('dni',$_REQUEST['dni']);
        $alumno->__SET('fecha_nacimiento',$_REQUEST['fecha_nacimiento']);
        $alumno->__SET('curso',$_REQUEST['curso']);
        $alumno->__SET('carrera',$_REQUEST['carrera']);
        //$alumno->__SET('foto',$_REQUEST['foto']);

        $alumno->__SET('ingresado_por',$_SESSION['Usuario_Actual']);    
        /*Validar Documento / Si no existe Registrar / Mostrar un mensaje que indique que el dni ya fue registrado*/
        $registrar_alumno = $this->model->Registrar($alumno);  
         //echo $registrar_Alumno;
        if($registrar_alumno=='error'){
            header('Location: index.php?c=Alumno&a=v_Registrar');
            echo 'No se Ha Podido Registrar';
         }else{
            echo 'Registrado Correctamente';
            header('Location: index.php?c=Alumno');
         }
    }

    public function Eliminar(){
        $alumno = new Alumno();
        $alumno->__SET('idAlumno',$_REQUEST['idAlumno']);      
        $alumno->__SET('modificado_por',$_SESSION['Usuario_Actual']);
        $alumno->__SET('eliminado',1); 
        $eliminar_alumno = $this->model->Eliminar($alumno);  
         
        if($eliminar_alumno=='error'){
            echo 'No se Ha Podido Eliminar la Alumno';
            header('Location: index.php?c=Alumno');            
        }else{
            echo 'Origen Eliminado Correctamente';
            header('Location: index.php?c=Alumno');
        }
    }


    public function redirect($url)
    {
        header("Location: $url");
    }   

}