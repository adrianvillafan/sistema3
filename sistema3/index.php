<?php

//llamar al archivo usuario.controller.php
require_once 'controller/usuario.controller.php';
//Instanciamos el controlador del Usuario
$User = new UsuarioController();

//verificamos si el usuario no esta logueado
if(!$User->Verificar_InicioSesion()){
    //si no esta logueado redireccionamo al formulario login.php
    $User->redirect('login.php');
    
}else{
    ini_set('memory_limit', '-1');
    ini_set('max_execution_time', -1);
    require_once 'controller/index.controller.php';
    date_default_timezone_set('America/Lima');
                     

    define( 'RUTA_HTTP', 'http://' . $_SERVER['HTTP_HOST'] . '/Documentos/sistema3/sistema3' );

    // Todo esta lógica hara el papel de un FrontController
    if(isset($_REQUEST['c'])=='' || isset($_REQUEST['c'])==''){

         //Instanciamos el controlador del Index
        $controller = new IndexController();
       //Llamamos a la funcion index
        $controller->Index();   
    
    }else{

        // Obtenemos el controlador que queremos cargar
        $controller = $_REQUEST['c'] . 'Controller';

        //convertimos el nombre del controlador a minusculas
        $control_name = strtolower($_REQUEST['c']);

        // Obtenemos la accion que queremos cargar
        $action=isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
        
        //guardamos en una variable la carpeta y el nombre de la clase controladora 
        $name_file =  'controller/'.$control_name.'.controller.php';

        //verificamos si el archivo existe
        if (file_exists($name_file)) {

            //echo "El fichero $nombre_fichero existe";
            require_once 'controller/'.$control_name.'.controller.php';

        }else{

            // echo 'No existe el archivo controlador : '.$nombre_fichero.'<br>';
            header('Location: index.php?c=index&a=error');           
        }

        //verificamos si la clase controladora existe
        if (class_exists($controller)) {

            // Instanciamos el controlador
            $controller = new $controller();

            //verificamos si el metodo existe    
            if (method_exists($controller, $action)) {

                // Llamar a la accion 
                call_user_func( array( $controller, $action ) );

            }else{

                // echo 'No existe el metodo';
                header('Location: index.php?c=index&a=error');

            }       
        }else{            
            //echo 'No existe el controlador';
            header('Location: index.php?c=index&a=error');
        }
    }   
}