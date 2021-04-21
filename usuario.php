<?php 

// importar la conexion 
require 'includes/app.php';
$db = conectarDB();
//crear un email y password 

$email = "correo@correo.com";
$password = "123456";
//query para crear el usuario

$passwordHash = password_hash($password,PASSWORD_DEFAULT);// esto permite hashear las password para que no se vea la clave cuando el usuario es administrador
//var_dump($passwordHash);
// para password siempre se usa 60 caracteres con char en la base de datos
$query = "INSERT INTO usuarios (email,password) VALUES ('${email}','${passwordHash}')";

// agregarlo a la base de datos
mysqli_query($db,$query);
?>