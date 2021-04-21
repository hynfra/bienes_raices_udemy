

<?php
require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';
// ----ESTA CLASE SE ENCARGA DE LLAMAR FUNCIONES Y CLASES ----
$db = conectarDB();

use App\activeRecord;

activeRecord::setDB($db);// al ser estatico no requiere instancear la clase
// se cambio a activeRecord por que todas las clases heredan de esta 
