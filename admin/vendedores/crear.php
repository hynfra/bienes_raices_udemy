<?php 
require '../../includes/app.php';
use App\Vendedor;
 estaAutenticado();
$vendedor = new Vendedor;
$errores = Vendedor::getErrores();


if($_SERVER['REQUEST_METHOD'] === 'POST'){
// crea nueva instancia 
$vendedor = new Vendedor($_POST['vendedor']); // se pone vendedor para que pase cada instancia de la clase con sus atributos

// validar campos
$errores = $vendedor->validar();
if(empty($errores)){
    $vendedor->guardar();
}

}
incluirTemplate('header');
?>
<main class="contenedor seccion">
       <h1>Registrar Vendedores</h1>
       <?php foreach($errores as $error):?>
          <div class="alerta error">
                <?php echo $error;?>
          </div>
       <?php endforeach;?>
       <a href="../index.php" class="boton boton-verde">volver</a>
       <!--enctype es necesario para enviar archivos-->
       <form action="../vendedores/crear.php" method="POST" class="formulario" enctype="multipart/form-data">
         <?php  include '../../includes/templates/formularios_vendedores.php';?>
           <input type="submit" value="registrar vendedor" class="boton boton-verde">
       </form>
   </main>
   <?php incluirTemplate('footer');?>
