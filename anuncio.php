<?php 
require 'includes/app.php';
use App\Propiedad;
$id = intval($_GET['id']);
$id = filter_var($id,FILTER_VALIDATE_INT);
if(!$id){
    header('Location: /');
}
$propiedad = Propiedad::find($id);


incluirTemplate('header');// se pasa el nombr edel template que estamos tratando de llamar?>
   <main class="contenedor seccion contenido-centrado">
       <h1><?php echo $propiedad->titulo;?></h1>
       
            <img loading="lazy"src="/imagenes/<?php echo $propiedad->imagen;?>" alt="imagen casa">
       <div class="resumen-propiedad">
           <p class="precio"><?php echo $propiedad->precio;?></p>
            <ul class="iconos-caracteristicas">
                       <li>
                           <img  loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                           <p><?php echo $propiedad->wc;?></p>
                       </li>
                        <li>
                           <img  loading= "lazy" src="build/img/icono_estacionamiento.svg" alt="icono wc">
                           <p><?php echo $propiedad->estacionamiento;?></p>
                       </li>
                        <li>
                           <img  loading= "lazy" src="build/img/icono_dormitorio.svg" alt="icono wc">
                           <p><?php echo $propiedad->habitaciones;?></p>
                       </li>
                   </ul>
       </div>
       <p><?php echo $propiedad->descripcion;?></p>
   </main>
<?php incluirTemplate('footer');?>