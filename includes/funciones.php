<?php


define('TEMPLATES_URL',__DIR__.'/templates/');//para agregar rutas no es necesario colocar una ruta especifica, sino dejar a PHP que defina una ruta 
//__DIR__ es una global recibe la ubicacion del archivo actual, en este caso donde esta app.php (carpeta includes) y a partir de alli va a templates 
define('FUNCIONES_URL',__DIR__.'funciones.php');

define('CARPETA_IMAGENES',__DIR__.'/../imagenes/');

function incluirTemplate(  $nombre,$inicio = false){// si inicio no esta, inicio sera igual a false, por lo que nunca dara null
    include TEMPLATES_URL .$nombre.'.php';// se escribe $ y luego corchetes para incluir la variable escrita en la funcion
}

function estaAutenticado(){
    session_start();
    $login = $_SESSION['login'];

    if(!$login){// verifica que se entro con una cuenta autenticada
        header('location: /');
    }//en un if si solo tienes return no es necesario abrir un else


    
}

function debuguear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit; 
}
// escapa / sanitizar el HTML
function s($html){
 $s = htmlspecialchars($html);
 return $s;
}
function validarTipoContenido($tipo){
    $tipos = ['vendedor', 'propiedad'];// tipos de datos en bd
    return in_array($tipo,$tipos);// el primero lo que se quiere buscar y el segundo donde se quiere buscar 
}

// muestra notificacion
function mostrarNotificacion($codigo){
        $mensaje = '';
        switch($codigo){
            case 1:
                $mensaje = 'creado correctamente';
                break;
            case 2:
                $mensaje = 'Eliminado correctamente';
                break;
            case 3:
                 $mensaje = 'Actualizado correctamente';
                 break;
            default:
                $mensaje = false;
                break;
        }
        return $mensaje;
}