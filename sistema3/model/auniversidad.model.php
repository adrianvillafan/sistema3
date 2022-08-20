<?php
include_once 'conexion.php';
class AuniversidadModel 
{
	
 private $bd;

   

    public function Listar()
    {
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("SELECT * FROM auniversidad where eliminado=0 order by idAuniversidad;" );
        $stmt->execute();

        if (!$stmt->execute()) {
            return 'error';
            //print_r($stmt->errorInfo());
        }else{            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }       

    }


        


    public function Consultar(Auniversidad $auniversidad)
    {
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("SELECT * FROM auniversidad WHERE idAuniversidad = :idAuniversidad;");
        $stmt->bindParam(':idAuniversidad', $auniversidad->__GET('idAuniversidad'));
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);      
        $objAuniversidad = new Auniversidad(); 
        $objAuniversidad->__SET('idAuniversidad',$row->idAuniversidad);

        $objAuniversidad->__SET('codigo',$row->codigo);
        $objAuniversidad->__SET('nombre',$row->nombre);
        $objAuniversidad->__SET('direccion',$row->direccion);
        $objAuniversidad->__SET('licenciado',$row->licenciado);
        $objAuniversidad->__SET('cantidad_carreras',$row->cantidad_carreras);
        $objAuniversidad->__SET('ingresado_por',$row->ingresado_por);
        $objAuniversidad->__SET('modificado_por',$row->modificado_por);
        $objAuniversidad->__SET('activo',$row->activo);
   
        return $objAuniversidad;
    }



    public function Actualizar(Auniversidad $auniversidad)
    {
      
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("UPDATE auniversidad SET codigo=:codigo,
        nombre=:nombre,direccion=:direccion,
        licenciado=:licenciado,cantidad_carreras=:cantidad_carreras,ingresado_por=:ingresado_por,modificado_por=:modificado_por,
        activo=:activo WHERE idAuniversidad=:idAuniversidad;");

        $stmt->bindParam(':idAuniversidad',$auniversidad->__GET('idAuniversidad'));
        $stmt->bindParam(':codigo',$auniversidad->__GET('codigo'));
        $stmt->bindParam(':nombre',$auniversidad->__GET('nombre'));
        $stmt->bindParam(':direccion',$auniversidad->__GET('direccion'));
        $stmt->bindParam(':licenciado',$auniversidad->__GET('licenciado'));
        $stmt->bindParam(':cantidad_carreras',$auniversidad->__GET('cantidad_carreras'));
        $stmt->bindParam(':ingresado_por',$auniversidad->__GET('ingresado_por'));
        $stmt->bindParam(':modificado_por',$auniversidad->__GET('modificado_por'));
        $stmt->bindParam(':activo',$auniversidad->__GET('activo'));

           
        if (!$stmt->execute()) {
          
           // $errors = $stmt->errorInfo();
            
             return 'error';
           //return $errors[2];  
        }else{
            
            return 'exito';
        }
    }    

    public function Registrar(Auniversidad $auniversidad)
    {
       
  
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("INSERT INTO auniversidad(codigo,nombre,
        direccion,licenciado,cantidad_carreras,ingresado_por) 
        VALUES(:codigo,:nombre,:direccion,:licenciado,:cantidad_carreras,:ingresado_por)");

      
        $stmt->bindParam(':codigo',$auniversidad->__GET('codigo'));
        $stmt->bindParam(':nombre',$auniversidad->__GET('nombre'));
        $stmt->bindParam(':direccion',$auniversidad->__GET('direccion'));
        $stmt->bindParam(':licenciado',$auniversidad->__GET('licenciado'));
        $stmt->bindParam(':cantidad_carreras',$auniversidad->__GET('cantidad_carreras'));
        $stmt->bindParam(':ingresado_por',$auniversidad->__GET('ingresado_por'));

        
 

        if (!$stmt->execute()) {
            //$errors = $stmt->errorInfo();
             //echo($errors[2]);
           //return $errors[2];
           return 'error';          
            //print_r($stmt->errorInfo());
        }else{
            
            return 'exito';
        }
    }

    public function Eliminar(Auniversidad $auniversidad)
    {
       
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("UPDATE auniversidad SET  modificado_por=:modificado_por,eliminado=:eliminado WHERE idAuniversidad = :idAuniversidad");

        $stmt->bindParam(':idAuniversidad',$auniversidad->__GET('idAuniversidad'));         
        $stmt->bindParam(':modificado_por',$auniversidad->__GET('modificado_por'));
        $stmt->bindParam(':eliminado',$auniversidad->__GET('eliminado'));    
        if (!$stmt->execute()) {
            return 'error';
        //print_r($stmt->errorInfo());
        }else{
            
            return 'exito';
        }
         
    }
 
}