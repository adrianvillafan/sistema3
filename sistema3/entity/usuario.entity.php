<?php

class Usuario
{


    private $idUsuario;
    private $Persona_id;
    private $login;
    private $password;
    private $Perfil_id;
    private $fecha_registro;
    private $ingresado_por;
    private $modificado_por;
    private $fecha_modificacion;
    private $activo;
    private $eliminado;

    public function __GET($atributo){ 

      return $this->$atributo; 
      
    }

    public function __SET($atributo, $variable){

      return $this->$atributo = $variable; 

    }

   

}