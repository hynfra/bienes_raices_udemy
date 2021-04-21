<?php 
use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;
require '../../includes/app.php';//require es para codigo importante que es vital para que funcione toro
estaAutenticado();

//validar id valido
$id = $_GET['id'];// recibimos la id de index
$id = filter_var($id,FILTER_VALIDATE_INT);// valida que se reciba un numero


$propiedad = Propiedad::find($id);
//debuguear($propiedad);
$vendedores = Vendedor::all();// permite que salgan los selectores de vendedores en el formulario
$errores = Propiedad::getErrores();
//$_POST devuelve todo lo que se hace con post y $_SERVER  entrega toda la informacion del server en forma de array
//se definen las variables para agregarlas dentro de value en el html, y asi no se borre los datos al ingresarlos
if($_SERVER['REQUEST_METHOD'] === 'POST'){// se llama desde la global server una parte del array llamado REQUEST_METHOD para saber si se uso post o no
    $args = $_POST['propiedad'];// los nombres cambiados estan asignados en el name del formulario html
    $propiedad->sincronizar($args);// sincroniza los datos del objeto ya creado con los cambios que el usuario realizo
    //$titulo = mysqli_real_escape_string($db, $_POST['titulo']);//mysqli_real_escape_string protege de inyecciones SQL

    $errores = $propiedad->validar();


    if(empty($errores)){
        /* SUBIDA DE ARCHIVOS*/
        //CREAR CARPETA
        $image = null;
        $carpetaImagenes = '../../imagenes/';
        if(!is_dir($carpetaImagenes)){// pregunta si no existe la carpeta imagenes, y si no existe la crea
            mkdir($carpetaImagenes);  
        }
        $nombreImagen = md5(uniqid(rand(), true)).'.jpg';
        //validacion subida de archivos
        if($_FILES['propiedad']['tmp_name']['imagen']){
            // esto se guarda en memoria
              $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);// se usa la libreria, donde pide la imagen que se guarda en $_files y el nombre para luego llamar a la funcion fit que recorda la imagen segun los parametros que se le ponga
              $propiedad->setImagen($nombreImagen);// poner el nombre de imagen a la clase propiedad
        }
        if(empty($errores)){
            if($_FILES['propiedad']['tmp_name']['imagen']){
            $image->save(CARPETA_IMAGENES . $nombreImagen);
             }
            $propiedad->guardar();
           
        }
       /* forma espaguetti de imagenif($imagen['name']){
            $rutaImagen = $carpetaImagenes . $propiedad['imagen']; 
           unlink(realpath($rutaImagen));// elimina archivos, recibe la carpeta junto con el nombre de imagen en forma de ruta
            $nombreImagen = md5(uniqid(rand(), true));// crea un nombre unico a base de numeros y letras random
        
            move_uploaded_file($imagen['tmp_name'],$carpetaImagenes.'/'.$nombreImagen.".jpg");// mueve el archivo subido a otra ruta, el primero es la ruta que esta tomando la imagen y el segundo la ruta que se quiere dirigir.
        }else{// de esta forma si no se agrego ninguna imagen no se borrara la que estaba ingresada
            $nombreImagen = $propiedad['imagen'];
        }*/
         
      
    }
    
}

incluirTemplate('header');
?>
   <main class="contenedor seccion">
       <h1>actualizar propiedad</h1>
       <?php foreach($errores as $error):?>
          <div class="alerta error">{}
                <?php echo $error;?>
          </div>
       <?php endforeach;?>
       <a href="../index.php" class="boton boton-verde">volver</a>
       <!--enctype es necesario para enviar archivos-->
       <form method="POST" class="formulario" enctype="multipart/form-data">
          <!--si se lanza el form sin el action se envia al mismo archivo-->
          <?php  include '../../includes/templates/formularios_propiedades.php';?>
           <input type="submit" value="actualizar propiedad" class="boton boton-verde">
       </form>
   </main>
<?php incluirTemplate('footer');?>