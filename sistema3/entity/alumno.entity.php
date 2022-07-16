<?php

class Alumno
{



    private $idAlumno;
    private $primer_nombre;
    private $apellido_paterno;
    private $apellido_materno;
    private $edad;
    private $dni;
    private $fecha_nacimiento;
    private $curso;
    private $carrera;
    private $ingresado_por;
    private $modificado_por;
    private $activo;
    private $eliminado;
    
    public function __GET($atributo){ 

      return $this->$atributo; 
      
    }

    public function __SET($atributo, $variable){

      return $this->$atributo = $variable; 

    }


}