<?php
include_once 'conexion.php';
class CursoModel 
{
	
 private $bd;

   

    public function Listar()
    {
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("SELECT * FROM curso where eliminado=0 order by idCurso;" );
        $stmt->execute();

        if (!$stmt->execute()) {
            return 'error';
            //print_r($stmt->errorInfo());
        }else{            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }       

    }

    public function Registrar(Curso $curso)
    {
       
  
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("INSERT INTO curso(nombre,profesor,ingresado_por) VALUES(:nombre,:profesor,:ingresado_por)");

      
        $stmt->bindParam(':nombre',$curso->__GET('nombre'));
        $stmt->bindParam(':profesor',$curso->__GET('profesor'));

        $stmt->bindParam(':ingresado_por',$curso->__GET('ingresado_por')); 

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

    public function Consultar(Curso $curso)
    {
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("SELECT * FROM curso WHERE idCurso = :idCurso;");
        $stmt->bindParam(':idCurso', $curso->__GET('idCurso'));
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);      
        $objCurso = new Curso(); 
        $objCurso->__SET('idCurso',$row->idCurso);
        $objCurso->__SET('nombre',$row->nombre);
        $objCurso->__SET('profesor',$row->profesor);

        $objCurso->__SET('activo',$row->activo);
   
        return $objCurso;
    }

    public function Actualizar(Curso $curso)
    {
      
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("UPDATE curso SET nombre=:nombre,profesor=:profesor,activo=:activo,modificado_por=:modificado_por WHERE idCurso=:idCurso;");

        $stmt->bindParam(':idCurso',$curso->__GET('idCurso'));
        $stmt->bindParam(':nombre',$curso->__GET('nombre'));
        $stmt->bindParam(':profesor',$curso->__GET('profesor'));
        
        $stmt->bindParam(':activo',$curso->__GET('activo'));
        $stmt->bindParam(':modificado_por',$curso->__GET('modificado_por'));

           
        if (!$stmt->execute()) {
          
           // $errors = $stmt->errorInfo();
            
             return 'error';
           //return $errors[2];  
        }else{
            
            return 'exito';
        }
    }    

    public function Eliminar(Curso $curso)
    {
       
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("UPDATE curso SET  modificado_por=:modificado_por,eliminado=:eliminado WHERE idCurso = :idCurso");

        $stmt->bindParam(':idCurso',$curso->__GET('idCurso'));         
        $stmt->bindParam(':modificado_por',$curso->__GET('modificado_por'));
        $stmt->bindParam(':eliminado',$curso->__GET('eliminado'));    
        if (!$stmt->execute()) {
            return 'error';
        //print_r($stmt->errorInfo());
        }else{
            
            return 'exito';
        }
         
    }

 
}