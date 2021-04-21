<?php require 'includes/funciones.php';//require es para codigo importante que es vital para que funcione toro

incluirTemplate('header');// se pasa el nombr edel template que estamos tratando de llamar?>
   <main class="contenedor seccion contenido-centrado">
       <h1>Guia de la decoracion de tu hogar </h1>
       <p class="informacion-meta">escrito por <span> 20/02/21</span>por <span>admin.</span></p>
       <picture>
           <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy"src="build/img/destacada.jpg" alt="imagen casa">
       </picture>
       <div class="resumen-propiedad">
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis ipsa a labore, optio id, sit voluptas rerum quisquam porro consequuntur modi animi illum tenetur asperiores nemo ut nobis aliquam. Voluptate.</p>
       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi ipsam aliquam fugiat. Veritatis obcaecati ut labore laboriosam, asperiores sit ducimus magni. Et neque quaerat, maxime eum, velit, excepturi, quam repellendus repudiandae laborum libero beatae. Dolorum sint laborum modi. Enim veritatis, pariatur minima veniam quod sint repellendus quaerat, reiciendis quisquam perspiciatis praesentium asperiores itaque voluptatibus, iste recusandae totam voluptate voluptates labore optio officia ut dicta? Perspiciatis dignissimos obcaecati praesentium, sequi quos esse, rem totam animi nemo inventore! Animi deleniti, possimus pariatur sint doloribus maiores nemo eaque voluptate, reiciendis hic, est sapiente. Deleniti ad, magnam quasi accusantium numquam neque accusamus placeat repellendus!</p>
       </div>
       
   </main>
<?php incluirTemplate('footer');?>