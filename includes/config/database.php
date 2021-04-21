<?php



function conectarDB() : mysqli{ // esto indica que el metodo retornara un mysqli
    $db = new mysqli('localhost','root','','bienes_raices'); // se usa new en la version POO
    if(!$db){
        echo "No se pudo conectar";
        exit;
    }
    return $db;
}