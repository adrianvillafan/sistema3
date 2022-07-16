<?php
include_once 'conexion.php';
class UsuarioModel 
{
	
 private $bd;

   

    public function Listar()
    {
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("SELECT idUsuario,login,Perfil_id,usuario.activo,perfil.nombre as Perfil FROM usuario 
INNER JOIN perfil on perfil.idPerfil=usuario.perfil_id
where usuario.eliminado=0 order by idUsuario desc" );
        $stmt->execute();

        if (!$stmt->execute()) {
            return 'error';
            print_r($stmt->errorInfo());
        }else{            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);       }
        

    }

    public function Consultar_informacion_usuario($idUsuario)
    {
         
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("SELECT usuario.idUsuario,login,usuario.Perfil_id,persona.primer_nombre,persona.apellido_paterno,perfil.idPerfil,perfil.nombre as perfil from usuario
inner join perfil on perfil.idPerfil=usuario.Perfil_id
inner join persona on persona.idPersona=usuario.Persona_id
 where idUsuario=$idUsuario;" );
        

        if (!$stmt->execute()) {
            return 'error';
            //print_r($stmt->errorInfo());
        }else{            
            return $stmt->fetch(PDO::FETCH_ASSOC);       
        }
        

    }
    public function Consultar(Usuario $usuario)
    {
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("SELECT * FROM usuario WHERE idUsuario = :idUsuario");
        $stmt->bindParam(':idUsuario', $usuario->__GET('idUsuario'));
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);      

        $objUsuario = new Usuario();     
        $objUsuario->__SET('idUsuario',$row->idUsuario);
        $objUsuario->__SET('Persona_id',$row->Persona_id);
        $objUsuario->__SET('login',$row->login);
        $objUsuario->__SET('password',$row->password);
        $objUsuario->__SET('Perfil_id',$row->Perfil_id);
        $objUsuario->__SET('activo',$row->activo);      

        
        return $objUsuario;
    }

    public function Actualizar(Usuario $usuario)
    {
       
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("UPDATE usuario SET  login = :login,password=:password,Perfil_id=:Perfil_id,modificado_por=:modificado_por,activo=:activo WHERE idUsuario = :idUsuario");

        $stmt->bindParam(':idUsuario',$usuario->__GET('idUsuario'));
        $stmt->bindParam(':login',$usuario->__GET('login'));
        $stmt->bindParam(':password',$usuario->__GET('password'));
        $stmt->bindParam(':Perfil_id',$usuario->__GET('Perfil_id'));       
        $stmt->bindParam(':modificado_por',$usuario->__GET('modificado_por'));
        $stmt->bindParam(':activo',$usuario->__GET('activo'));    
        if (!$stmt->execute()) {
            return 'error';
        //print_r($stmt->errorInfo());
        }else{
            
            return 'exito';
        }
    }    

    public function registrar(Usuario $usuario)
    {
       
       
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("INSERT INTO usuario(login,password,Perfil_id,Persona_id,ingresado_por) VALUES(:login,:password,:Perfil_id,:Persona_id,:ingresado_por)");
        $stmt->bindValue(':login', $usuario->__GET('login'),PDO::PARAM_STR);
        $stmt->bindValue(':password', $usuario->__GET('password'),PDO::PARAM_STR);
        $stmt->bindValue(':Perfil_id', $usuario->__GET('Perfil_id'),PDO::PARAM_INT);
        $stmt->bindValue(':Persona_id', $usuario->__GET('Persona_id'),PDO::PARAM_INT);
        $stmt->bindValue(':ingresado_por', $usuario->__GET('ingresado_por'),PDO::PARAM_STR);
      

        if (!$stmt->execute()) {
            $errors = $stmt->errorInfo();
            // echo($errors[2]);
           return $errors[2];          
            //print_r($stmt->errorInfo());
        }else{
            
            return 'exito';
        }
    }

    public function Eliminar(Usuario $usuario)
    {
       
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("UPDATE usuario SET  modificado_por=:modificado_por,eliminado=:eliminado WHERE idUsuario = :idUsuario");

        $stmt->bindParam(':idUsuario',$usuario->__GET('idUsuario'));         
        $stmt->bindParam(':modificado_por',$usuario->__GET('modificado_por'));
        $stmt->bindParam(':eliminado',$usuario->__GET('eliminado'));    
        if (!$stmt->execute()) {
            return 'error';
        //print_r($stmt->errorInfo());
        }else{
            
            return 'exito';
        }
         
    }


	public function Validar_Usuario(Usuario $usuario)
    {
        try
        {       
        	//instanciamos a la clase conexion 
            $this->bd = new Conexion();
        	
            //preparamos la consulta sql para verificar si el usuario existe en la BD
            $stmt = $this->bd->prepare("SELECT * FROM usuario WHERE login=:Login and eliminado=0");
            $stmt->bindParam(':Login', $usuario->__GET('login'));
            //ejecutamos la consulta sql        
            $stmt->execute();
            //almacenamos los registros obtenidos de la consulta
            $usuario_registrado=$stmt->fetch(PDO::FETCH_ASSOC);
            
            //verificamos si se han encontrado registros
            if($stmt->rowCount() > 0)
            {

                //si se an encontrado registros comparamos las contraseñas
                if(strtolower($usuario->__GET('password'))==strtolower($usuario_registrado['password']))
                {
                    //validamos que el usuario este activo en la BD 
                    if($usuario_registrado['activo']==1)
	                {
	                    //devolvemos los datos del  usuario
	                    return $usuario_registrado;
	                }
	                else
	                {
	                    return FALSE;
                	}	
                }
                else
                {
                    return FALSE;
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

  
}