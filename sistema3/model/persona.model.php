<?php
include_once 'conexion.php';
class PersonaModel 
{
	
 private $bd;

   

    public function Listar()
    {
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("SELECT * FROM persona where eliminado=0 order by idPersona;" );
        $stmt->execute();

        if (!$stmt->execute()) {
            return 'error';
            //print_r($stmt->errorInfo());
        }else{            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }       

    }


        public function ListarPersonalTI()
    {
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("SELECT * FROM persona where eliminado=0 and activo=1 and Cargo_id=0 order by primer_nombre asc;" );
        $stmt->execute();

        if (!$stmt->execute()) {
            return 'error';
            //print_r($stmt->errorInfo());
        }else{            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }       

    }


    public function Consultar(Persona $persona)
    {
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("SELECT * FROM persona WHERE idPersona = :idPersona;");
        $stmt->bindParam(':idPersona', $persona->__GET('idPersona'));
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);      
        $objPersona = new Persona(); 
        $objPersona->__SET('idPersona',$row->idPersona);
        $objPersona->__SET('codigo',$row->codigo);
        $objPersona->__SET('dni',$row->dni);
        $objPersona->__SET('primer_nombre',$row->primer_nombre);
        $objPersona->__SET('segundo_nombre',$row->segundo_nombre);
        $objPersona->__SET('apellido_paterno',$row->apellido_paterno);
        $objPersona->__SET('apellido_materno',$row->apellido_materno);
        $objPersona->__SET('fecha_nacimiento',$row->fecha_nacimiento);
        $objPersona->__SET('sexo',$row->sexo);
        $objPersona->__SET('celular',$row->celular);
        $objPersona->__SET('fecha_ingreso',$row->fecha_ingreso);
        $objPersona->__SET('fecha_salida',$row->fecha_ingreso);
        $objPersona->__SET('tipo_horario',$row->tipo_horario);
        $objPersona->__SET('horario_entrada',$row->horario_entrada);
        $objPersona->__SET('horario_salida',$row->horario_salida);
        $objPersona->__SET('correo',$row->correo);
        $objPersona->__SET('activo',$row->activo);
   
        return $objPersona;
    }



    public function Consultar_persona_dia($fecha_ingreso)
    {
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("SELECT count(idPersona)+1 as nro_persona FROM  persona WHERE fecha_ingreso=:fecha_ingreso;");
        $stmt->bindParam(':fecha_ingreso', $fecha_ingreso);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);      
        $nro_persona= $row->nro_persona;
       
              
        return $nro_persona;
    }

    public function Actualizar(Persona $persona)
    {
      
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("UPDATE persona SET  primer_nombre=:primer_nombre,segundo_nombre=:segundo_nombre,apellido_paterno=:apellido_paterno,apellido_materno=:apellido_materno,fecha_nacimiento=:fecha_nacimiento,sexo=:sexo,celular=:celular,tipo_horario=:tipo_horario,horario_entrada=:horario_entrada,horario_salida=:horario_salida,correo=:correo,fecha_salida=:fecha_salida,activo=:activo,modificado_por=:modificado_por WHERE idPersona=:idPersona;");

        $stmt->bindParam(':idPersona',$persona->__GET('idPersona'));
        $stmt->bindParam(':primer_nombre',$persona->__GET('primer_nombre'));
        $stmt->bindParam(':segundo_nombre',$persona->__GET('segundo_nombre'));
        $stmt->bindParam(':apellido_paterno',$persona->__GET('apellido_paterno'));
        $stmt->bindParam(':apellido_materno',$persona->__GET('apellido_materno'));
        $stmt->bindParam(':fecha_nacimiento',$persona->__GET('fecha_nacimiento'));
        $stmt->bindParam(':sexo',$persona->__GET('sexo'));
        $stmt->bindParam(':celular',$persona->__GET('celular'));
        $stmt->bindParam(':tipo_horario',$persona->__GET('tipo_horario'));
        $stmt->bindParam(':horario_entrada',$persona->__GET('horario_entrada'));
        $stmt->bindParam(':horario_salida',$persona->__GET('horario_salida'));
        $stmt->bindParam(':correo',$persona->__GET('correo'));
        $stmt->bindParam(':fecha_salida',$persona->__GET('fecha_salida'));
        $stmt->bindParam(':activo',$persona->__GET('activo'));
        $stmt->bindParam(':modificado_por',$persona->__GET('modificado_por'));

           
        if (!$stmt->execute()) {
          
           // $errors = $stmt->errorInfo();
            
             return 'error';
           //return $errors[2];  
        }else{
            
            return 'exito';
        }
    }    

    public function Registrar(Persona $persona)
    {
       
  
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("INSERT INTO persona(primer_nombre,segundo_nombre,apellido_paterno,apellido_materno,dni,codigo,celular,fecha_ingreso,fecha_nacimiento,sexo,tipo_horario,horario_entrada,horario_salida,correo,ingresado_por) VALUES(:primer_nombre,:segundo_nombre,:apellido_paterno,:apellido_materno,:dni,:codigo,:celular,:fecha_ingreso,:fecha_nacimiento,:sexo,:tipo_horario,:horario_entrada,:horario_salida,:correo,:ingresado_por)");

      
        $stmt->bindParam(':primer_nombre',$persona->__GET('primer_nombre'));
        $stmt->bindParam(':segundo_nombre',$persona->__GET('segundo_nombre'));
        $stmt->bindParam(':apellido_paterno',$persona->__GET('apellido_paterno'));
        $stmt->bindParam(':apellido_materno',$persona->__GET('apellido_materno'));
        $stmt->bindParam(':dni',$persona->__GET('dni'));
        $stmt->bindParam(':codigo',$persona->__GET('codigo'));
        $stmt->bindParam(':celular',$persona->__GET('celular'));
        $stmt->bindParam(':fecha_ingreso',$persona->__GET('fecha_ingreso'));
        $stmt->bindParam(':fecha_nacimiento',$persona->__GET('fecha_nacimiento'));
        $stmt->bindParam(':sexo',$persona->__GET('sexo'));
        $stmt->bindParam(':tipo_horario',$persona->__GET('tipo_horario'));
        $stmt->bindParam(':horario_entrada',$persona->__GET('horario_entrada'));
        $stmt->bindParam(':horario_salida',$persona->__GET('horario_salida'));
        $stmt->bindParam(':correo',$persona->__GET('correo'));
        $stmt->bindParam(':ingresado_por',$persona->__GET('ingresado_por')); 

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

    public function Eliminar(Persona $persona)
    {
       
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("UPDATE persona SET  modificado_por=:modificado_por,eliminado=:eliminado WHERE idPersona = :idPersona");

        $stmt->bindParam(':idPersona',$persona->__GET('idPersona'));         
        $stmt->bindParam(':modificado_por',$persona->__GET('modificado_por'));
        $stmt->bindParam(':eliminado',$persona->__GET('eliminado'));    
        if (!$stmt->execute()) {
            return 'error';
        //print_r($stmt->errorInfo());
        }else{
            
            return 'exito';
        }
         
    }
 
}