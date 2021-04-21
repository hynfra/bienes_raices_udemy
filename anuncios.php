<?php require 'includes/app.php';//require es para codigo importante que es vital para que funcione toro

incluirTemplate('header');// se pasa el nombr edel template que estamos tratando de llamar?>
   <main class="contenedor seccion">
         <h2>Casas y depas en venta</h2>
          <?php
       
       $limite = 10;
       include 'includes/templates/anuncios.php';
       
       
       ?>
   </main>
<?php incluirTemplate('footer');?>