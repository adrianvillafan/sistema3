<?php 
 class Conexion extends PDO { 
   private $tipo_de_base = 'mysql';
   private $host = 'localhost';
   private $nombre_de_base = 'sistema';
   private $usuario = 'root';
   private $contrasena = '';
   public function __construct() {
      try{
         parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
      }catch(PDOException $e){
         echo '<pre> Ha surgido un error y no se puede conectar a la base de datos.  Detalle: </br>' . $e->getMessage().'</pre>';
         exit;
      }
   } 
 }

?>
