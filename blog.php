<?php require 'includes/funciones.php';//require es para codigo importante que es vital para que funcione toro

incluirTemplate('header');// se pasa el nombr edel template que estamos tratando de llamar?>
   <main class="contenedor seccion contenido-centrado">
       <h1>NUESTRO BLOG</h1>
       <article class="entrada-blog"><!--article suele ir en post o blog-->
             <div class="imagen">
                 <picture>
                     <source srcset="build/img/blog1.webp" type="image/webp">
                      <source srcset="build/img/blog1.jpg" type="image/jpeg">
                      <img loading="lazy" src="build/img/blog1.jpg" alt="text oentrada blog">
                 </picture>
             </div>
             <div class="texto-entrada">
                 <a href="entrada.php">
                     <h4>Terraza en el techo de tu casa</h4>
                     <p>Escrito el <span>20/10/2021</span> por: <span>Admin</span></p>
                 </a>
                 <p>
                     Consejos para contruir tu terraza en el techo con los mejores materiales
                 </p>
             </div>
              
               
           </article>
           <article class="entrada-blog"><!--article suele ir en post o blog-->
             <div class="imagen">
                 <picture>
                     <source srcset="build/img/blog2.webp" type="image/webp">
                      <source srcset="build/img/blog2.jpg" type="image/jpeg">
                      <img loading="lazy" src="build/img/blog1.jpg" alt="text oentrada blog">
                 </picture>
             </div>
             <div class="texto-entrada">
                 <a href="entrada.php">
                     <h4>Guia para la decoracion de tu hogar</h4>
                     <p>Escrito el <span>20/10/2021</span> por: <span>Admin</span></p>
                 </a>
                 <p>
                    maximiza el espacio en tu hojar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                 </p>
             </div> 
           </article>
           <article class="entrada-blog"><!--article suele ir en post o blog-->
             <div class="imagen">
                 <picture>
                     <source srcset="build/img/blog3.webp" type="image/webp">
                      <source srcset="build/img/blog3.jpg" type="image/jpeg">
                      <img loading="lazy" src="build/img/blog1.jpg" alt="text oentrada blog">
                 </picture>
             </div>
             <div class="texto-entrada">
                 <a href="entrada.php">
                     <h4>Terraza en el techo de tu casa</h4>
                     <p>Escrito el <span>20/10/2021</span> por: <span>Admin</span></p>
                 </a>
                 <p>
                     Consejos para contruir tu terraza en el techo con los mejores materiales
                 </p>
             </div>
              
               
           </article>
           <article class="entrada-blog"><!--article suele ir en post o blog-->
             <div class="imagen">
                 <picture>
                     <source srcset="build/img/blog4.webp" type="image/webp">
                      <source srcset="build/img/blog4.jpg" type="image/jpeg">
                      <img loading="lazy" src="build/img/blog1.jpg" alt="text oentrada blog">
                 </picture>
             </div>
             <div class="texto-entrada">
                 <a href="entrada.php">
                     <h4>Guia para la decoracion de tu hogar</h4>
                     <p>Escrito el <span>20/10/2021</span> por: <span>Admin</span></p>
                 </a>
                 <p>
                    maximiza el espacio en tu hojar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                 </p>
             </div> 
           </article>
   </main>
<?php incluirTemplate('footer');?>