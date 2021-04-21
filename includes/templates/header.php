<?php 


if(!isset($_SESSION)){// con esto evitamos que se trate de iniciar sesion 2 veces
    session_start();
}
 $auth = $_SESSION['login'] ?? false;

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="../../build/css/app.css">
</head>
<body>
   <header class="header <?php echo $inicio ? 'inicio' : '';//aqui se pregunta si existe la variable y si existe pone la clase inicio ?>">
       <div class="contenedor contenido-header">
           <div class="barra">
              <a href="/">
                   <img src="../../src/img/logo.svg" alt="logotipo">
              </a>
            <div class="mobile-menu">
                  <img src="../../build/img/barras.svg" alt="">
              </div>
             <div class="derecha">
              <img src="../../build/img/dark-mode.svg" alt="" class="dark-mode-boton">
               <nav data-cy="navegacion-header" class="navegacion">
                  <a href="nosotros.php">Nosotros</a>
                  <a href="anuncios.php">Anuncios</a>
                  <a href="blog.php">Blog</a>
                  <a href="contacto.php">Contacto</a>
                  <?php if($auth): ?>
                  <a href="cerrar-sesion.php">Cerrar sesión</a>
                  <?php endif; ?>
                </nav>
             </div>
           </div>
           <?php 
           // pone el slogan en la pagina principal por que se pregunta que inicio este en true y este solo esta asi en la portada
           
           
           
           echo $inicio ? "<h1 data-cy='heading-sitio'>Venta de casas y departamentos exclusivos de lujo</h1>" : '';
           
           ?>
       </div>
   </header>