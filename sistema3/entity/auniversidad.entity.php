<?php

class Auniversidad
{



    private $idAuniversidad;
    private $codigo;
    private $nombre;
    private $direccion;
    private $licenciado;
    private $cantidad_carreras;
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