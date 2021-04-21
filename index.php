<?php  
require 'includes/app.php';//require es para codigo importante que es vital para que funcione toro

incluirTemplate('header',$inicio = true);// se pasa el nombr edel template que estamos tratando de llamar
//aqui se entrega la variable inicio en true para que ponga la clase inicio al header segun el template header.php, de esa forma tendra el header distinto al resto

?>
   <main class="contenedor seccion">
       <h2 data-cy="heading-massobre">Mas sobre nosotros</h2>
       <div class="iconos-nosotros" data-cy="iconos-nosotros">
           <div class="icono">
               <img src="build/img/icono1.svg" alt="Icono seguridad">
               <h3>Seguridad</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam laborum vel suscipit quis rerum, amet cum corporis dolorem laudantium harum nulla beatae officia ea accusamus quas eaque quaerat provident quidem.</p>
           </div>
             <div class="icono">
               <img src="build/img/icono1.svg" alt="Icono precio">
               <h3>precio</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam laborum vel suscipit quis rerum, amet cum corporis dolorem laudantium harum nulla beatae officia ea accusamus quas eaque quaerat provident quidem.</p>
           </div>
             <div class="icono">
               <img src="build/img/icono1.svg" alt="Icono tiempo">
               <h3>A tiempo</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam laborum vel suscipit quis rerum, amet cum corporis dolorem laudantium harum nulla beatae officia ea accusamus quas eaque quaerat provident quidem.</p>
           </div>
       </div>
   </main>
   <section class="seccion contenedor">
       <h2 data-cy="titulo-seccion-casas">Casas y departamentos en venta</h2>
       <?php
       include 'includes/templates/anuncios.php';
       
       
       ?>
       <div class="alinear-derecha">
           <a href="anuncios.php" class="boton-verde" data-cy="todas-propiedades">ver todas</a>
       </div>
   </section>
   <section class="imagen-contacto" data-cy="imagen-contacto">
       <h2>Encuentra la casa de tus sueños</h2>
       <p class="cambio">llena el formulario y un asesor se pondra en contacto contigo a la brevedad</p>
       <a href="contacto.php" class="boton-amarillo-block">Contactanos</a>
   </section>
   <div class="contenedor seccion seccion-inferior">
       <section data-cy="blog" class="blog">
           <h3>Nuestro blog</h3>
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
                     <p class="informacion-meta">Escrito el <span>20/10/2021</span> por: <span>Admin</span></p>
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
                     <p class="informacion-meta">Escrito el <span>20/10/2021</span> por: <span>Admin</span></p>
                 </a>
                 <p>
                    maximiza el espacio en tu hojar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                 </p>
             </div> 
           </article>
       </section><!-- FIN DE BLOG-->
       <section data-cy="testimoniales" class="testimoniales">
           <h3>Testimoniales</h3>
           <div class="testimonial">
               <blockquote>
                   El personal se comotor de una excelente forma, muy buena atencion y la clasa que me ofrecieron cumple con todas mis expectativas.
               </blockquote>
               <p>Matias vejar</p>
           </div>
       </section>
   </div>
<?php incluirTemplate('footer');?>