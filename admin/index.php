<?php
require '../includes/app.php';//require es para codigo importante que es vital para que funcione toro
$auth = estaAutenticado();
use App\Propiedad;
use App\Vendedor;
// escribir el query
$propiedades = Propiedad::all();
$vendedores = Vendedor::all();


 $resultado = $_GET['resultado'] ?? null;//recibe mensaje de correcto 
if($_SERVER['REQUEST_METHOD'] === 'POST'){// esto evita que el id se solicite solo cuando se necesita y ni marque undefined

    $id = $_POST['id'];
    //debuguear($id);
    $id = filter_var($id,FILTER_VALIDATE_INT);
    if($id){
        $tipo = $_POST['tipo'];
       
       if(validarTipoContenido($tipo)){
         // compara lo que vamos a eliminar
         if($tipo === 'vendedor'){
            $vendedor = Vendedor::find($id);
           
            $vendedor->eliminar();
         }else if($tipo === 'propiedad'){
            $propiedad = Propiedad::find($id);
            $propiedad->eliminar();

         }
       }
        
     
       
        
    
    }
}
//muestra mensaje incondicional
// incluye template
incluirTemplate('header');// se pasa el nombr edel template que estamos tratando de llamar?>
   <main class="contenedor seccion">
       <h1>administrador de bienes raices</h1>
      <?php
            $mensaje =  mostrarNotificacion(intval($resultado));
            if($mensaje){ // esto permitira que al ingresar un numero no valido no muestre nada ?>
            <p class="alerta exito"><?php echo s($mensaje);?></p>
            <?php }
      ?>
        
       <a href="../admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>
       <a href="../admin/vendedores/crear.php" class="boton boton-amarillo">Nuevo vendedor</a>
       <h2>Propiedades</h2>
       <table class="propiedades">
           <thead>
               <tr>
                   <th>ID</th>
                   <th>Titulo</th>
                   <th>Imagen</th>
                   <th>Precio</th>
                   <th>Acciones</th>
               </tr>
           </thead>
           <tbody><!--mostrar los comentarios-->
              <?php foreach($propiedades as $propiedad):?>
               <tr>
                   <td><?php echo $propiedad->id;?></td>
                   <td><?php echo $propiedad->titulo;?></td>
                   <td><img src="../imagenes/<?php echo $propiedad->imagen;?>" class="imagen-tabla"alt=""></td>
                   <td>$<?php echo $propiedad->precio;?></td>
                   <td>
                      <form method="POST" class="w-100">
                         <input type="hidden" name="id" value="<?php echo $propiedad->id;?>">
                          <!--este input hidden permite diferenciar las id de vendedor y propiedad-->
                          <input type="hidden" name="tipo" value="propiedad">
                          <input type="submit" class="boton-rojo-block" value="Eliminar">
                      </form>
                       
                       <!--se coloca dentro de la ruta la id de la propiedad y asi obtener los datos en la otra ventana -->
                       <a href="../admin/propiedades/actualizar.php?id=<?php echo $propiedad->id;?>" class="boton-amarillo-block">Actualizar</a>
                   </td>
               </tr>
               <?php endforeach;?>
           </tbody>
       </table>
       <h2>Vendedores</h2>
       <table class="propiedades">
           <thead>
               <tr>
                   <th>ID</th>
                   <th>Nombre</th>
                   <th>Telefono</th>
                   <th>Acciones</th>
               </tr>
           </thead>
           <tbody><!--mostrar los comentarios-->
              <?php foreach($vendedores as $vendedor):?>
               <tr>
                   <td><?php echo $vendedor->id;?></td>
                   <td><?php echo $vendedor->nombre . " ". $vendedor->apellido;?></td>
                   <td>$<?php echo $vendedor->telefono;?></td>
                   <td>
                      <form method="POST" class="w-100">
                         <input type="hidden" name="id" value="<?php echo $vendedor->id;?>">
                         <input type="hidden" name="tipo" value="vendedor">
                          <input type="submit" class="boton-rojo-block" value="Eliminar">
                      </form>
                       
                       <!--se coloca dentro de la ruta la id de la propiedad y asi obtener los datos en la otra ventana -->
                       <a href="../admin/vendedores/actualizar.php?id=<?php echo $vendedor->id;?>" class="boton-amarillo-block">Actualizar</a>
                   </td>
               </tr>
               <?php endforeach;?>
           </tbody>
       </table>
   </main>
<?php 
//cerrar
mysqli_close($db);
incluirTemplate('footer');?>