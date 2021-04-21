<?php 
require '../../includes/app.php';
use App\Vendedor;
 estaAutenticado();
//$vendedor = new Vendedor;

//validar id valido
$id = $_GET['id'];// recibimos la id de index
$id = filter_var($id,FILTER_VALIDATE_INT);// valida que se reciba un numero
if(!$id){
  header('Location: /admin');
}
$errores = Vendedor::getErrores();

$vendedor = Vendedor::find($id);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
// asignar los valores
$args = $_POST['vendedor']; // asignamos cada instancia de el array vendedor a la variable;
// sincronizar objeto en memoria con lo que escrbio el usuario
$vendedor->sincronizar($args); 

// errores de validacion
$errores = $vendedor->validar();

if(empty($errores)){
    $vendedor->guardar();// guarda los cambios en bd

}
}
incluirTemplate('header');
?>
<main class="contenedor seccion">
       <h1>Actualizar vendedor(a)</h1>
       <?php foreach($errores as $error):?>
          <div class="alerta error">
                <?php echo $error;?>
          </div>
       <?php endforeach;?>
       <a href="../index.php" class="boton boton-verde">volver</a>
       <!--enctype es necesario para enviar archivos-->
       <form method="POST" class="formulario" enctype="multipart/form-data">
         <?php  include '../../includes/templates/formularios_vendedores.php';?>
           <input type="submit" value="Guardar Cambios" class="boton boton-verde">
       </form>
   </main>
   <?php incluirTemplate('footer');?>
