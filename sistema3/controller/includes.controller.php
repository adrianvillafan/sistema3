<?php 

include_once 'model/conexion.php';
class IncludesController
{
    private $bd; 

    
      public function redirect($url)
  {
    header("Location: $url");
  }   

 /*--------- -------CONSULTAS A LA BD--------------------------------------------------- */
public function Consultas($sql)
    {

         $this->bd = new Conexion();
        try
        { 
            ini_set('memory_limit', '-1'); 

            $result = array();

            $stm = $this->bd->prepare($sql);
            $stm->execute();
            $registro = $stm->fetchAll();            
            return $registro;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

}
 ?>
