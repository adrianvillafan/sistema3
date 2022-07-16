<?php

class Perfil
{


    private $idPerfil;
    private $nombre;
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