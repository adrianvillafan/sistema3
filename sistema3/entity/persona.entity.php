<?php

class Persona
{



    private $idPersona;
    private $codigo;
    private $dni;
    private $primer_nombre;
    private $segundo_nombre;
    private $apellido_paterno;
    private $apellido_materno;
    private $sexo;
    private $celular;
    private $correo;
    private $fecha_nacimiento;
    private $tipo_horario;
    private $fecha_ingreso;
    private $fecha_salida;
    private $horario_entrada;
    private $horario_salida;
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