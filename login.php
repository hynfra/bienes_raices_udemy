<?php require 'includes/app.php';
$db = conectarDB();
$errores = [];
//autenticar el usuario
if($_SERVER['REQUEST_METHOD'] === 'POST'){// permite activar el codigo solo cuando se usa el formulario
    //echo "<pre>";
    //var_dump($_POST);
    // echo "</pre>";
    
    $email = mysqli_real_escape_string($db,filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)); // valida que sea string y que tenga formato de email
    
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    if(!$email){// verifica que existan datos en la variable
        $errores[] = "El email es obligatorio o no es valido";
    }
    if (!$password){
        $errores[] = "El password es obligatorio o no es valido";
    }
    
    if(empty($errores)){
        // revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '${email}'";
        $resultado = mysqli_query($db,$query);
        //var_dump($resultado);
        if($resultado->num_rows){// el resultado es un objeto por eso se accede con ->, y preguntamos si hay filas y si no hay quiere decir que el email ingresado no esta en la bbdd
            $usuario = mysqli_fetch_assoc($resultado);
            // verificar que el password es correcto
            
            $auth = password_verify($password,$usuario['password']);// permite verificar claves hasheadas
            if($auth){
                // el usuario esta autenticado
             session_start();// se debe usar esto siempre que se quiera usar $_SESSION
                // $_SESSION es un arreglo superglobal que se usa para sesiones 
                
                //llenar el arreglo de la sesion
                $_SESSION['usuario'] = $usuario['email'];
                 $_SESSION['login'] = true;
                header('location: admin/');
                
            }else{
                $errores[] = "el password es incorrecto";
            }
            
        }else{
            $errores[] = "El usuario no existe";
        }
    }
}

incluirTemplate('header');?>
   <main class="contenedor seccion contenido-centrado">
       <h1 data-cy="heading-login">Iniciar sesion</h1>
       <?php foreach($errores as $error):    ?>
           <div class="alerta error" data-cy="alerta-login"><?php echo $error;?></div>
       
       <?php endforeach;?>
   
       <form class="formulario" data-cy="formulario-login" method="post" NOVALIDATE>
          <!-- se uede poner NOVALIDATE en el form para que no valide nada por HTML-->
           <fieldset>
               <legend>Email y Clave</legend>
                <label for="email">email</label>
               <input type="email"  name="email" placeholder="tu email" id="email" required>
               <label for="password">Clave </label>
               <input type="password" name="password"  placeholder="tu Clave " id="password" required><!--debe ir type="password" para que no se vea la clave-->
           </fieldset>
           <input type="submit" value="Iniciar sesión" class="boton boton-verde">
       </form>
   </main>
<?php incluirTemplate('footer');?>