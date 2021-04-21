<?php 
require '../../includes/app.php';//require es para codigo importante que es vital para que funcione toro
use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;
 estaAutenticado();

// se pasa el nombr edel template que estamos tratando de llamar
$vendedores = Vendedor::all();

$db = conectarDB();
$propiedad = new Propiedad;

//$propiedad = new Propiedad;
$errores = Propiedad::getErrores();// llama a la clase propiedad y saca el metodo estatico getErrores
//$_POST devuelve todo lo que se hace con post y $_SERVER  entrega toda la informacion del server en forma de array
//se definen las variables para agregarlas dentro de value en el html, y asi no se borre los datos al ingresarlos
if($_SERVER['REQUEST_METHOD'] === 'POST'){// se llama desde la global server una parte del array llamado REQUEST_METHOD para saber si se uso post o no
    
   //$_POST['propiedad'] viene por que en el formulario del name se paso la variable objeto
    $propiedad = new Propiedad($_POST['propiedad']); // la clase propiedad recibe un arreglo y $_POST llega en forma de arreglo
     //CREAR CARPETA
     $carpetaImagenes = '../../imagenes';
     // CARPETA_IMAGENES es una constante definida en funciones y traida por app.php
     if(!is_dir(CARPETA_IMAGENES)){// pregunta si no existe la carpeta imagenes, y si no existe la crea
         mkdir(CARPETA_IMAGENES);  
     }
     
     $nombreImagen = md5(uniqid(rand(), true)).'.jpg';// crea un nombre unico a base de numeros y letras random
      // realiza un resize a la imagen con internvention
      if($_FILES['propiedad']['tmp_name']['imagen']){
          // esto se guarda en memoria
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);// se usa la libreria, donde pide la imagen que se guarda en $_files y el nombre para luego llamar a la funcion fit que recorda la imagen segun los parametros que se le ponga
          $propiedad->imagen = $nombreImagen;
      }
        // validar
      $errores = $propiedad->validar();
      //revisar que el array de errores este vacio
    
    if(empty($errores)){
        //$titulo = mysqli_real_escape_string($db, $_POST['titulo']);//mysqli_real_escape_string protege de inyecciones SQL
       
        
        //$imagen = $_FILES['imagen'];
        
        //validar por tamaño de archivo
       // $medida = 1000 * 100;
       // 
       // if($imagen['size'] > $medida){
       //     $errores[] = "La imagen es muy pesada";
       // }
        /* SUBIDA DE ARCHIVOS*/
       
        //move_uploaded_file($imagen['tmp_name'],$carpetaImagenes.'/'.$nombreImagen.".jpg");// mueve el archivo subido a otra ruta, el primero es la ruta que esta tomando la imagen y el segundo la ruta que se quiere dirigir.
       


        // guarda la imagen en el servidor
        $image->save(CARPETA_IMAGENES . $nombreImagen);
      
        $propiedad->guardar();
        
    }
    
}
incluirTemplate('header');
?>
   <main class="contenedor seccion">
       <h1>crear</h1>
       <?php foreach($errores as $error):?>
          <div class="alerta error">
                <?php echo $error;?>
          </div>
       <?php endforeach;?>
       <a href="../index.php" class="boton boton-verde">volver</a>
       <!--enctype es necesario para enviar archivos-->
       <form action="../propiedades/crear.php" method="POST" class="formulario" enctype="multipart/form-data">
         <?php  include '../../includes/templates/formularios_propiedades.php';?>
           <input type="submit" value="crear propiedad" class="boton boton-verde">
       </form>
   </main>
<?php incluirTemplate('footer');?>