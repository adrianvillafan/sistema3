<?php

class Curso
{



    private $idCurso;
    private $nombre;
    private $profesor;
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