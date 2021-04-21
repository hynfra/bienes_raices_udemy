<?php require 'includes/app.php';//require es para codigo importante que es vital para que funcione toro

incluirTemplate('header');// se pasa el nombr edel template que estamos tratando de llamar?>
   <main class="contenedor seccion">
       <h1>NOSOTROS</h1>
       <section class="contenido-nosotros">
           <div class="imagen">
               <picture>
                   <source srcset="build/img/nosotros.webp" type="image/webp">
                     <source srcset="build/img/nosotros.jpg" type="image/jpg">
                     <img loading="lazy" src="build/img/nosotros.jpg" alt="sobre nosotros">
               </picture>
           </div>
           <div class="texto-nosotros">
               <blockquote>
                   25 años de experiencia
               </blockquote>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et molestias ducimus asperiores harum saepe esse, recusandae numquam eaque perferendis reprehenderit, maxime animi architecto veritatis sunt quis aliquid enim odio aperiam. Amet cumque dolor dolores, ea repellendus facere excepturi quo iste hic. Enim iste dolorum deserunt quaerat nulla cupiditate ipsum, facere a tempore obcaecati reiciendis necessitatibus iure tenetur aut maiores voluptatibus ducimus blanditiis mollitia. A iste ratione, dolores excepturi minima officia molestiae nostrum consequuntur perferendis iusto cumque quaerat sapiente ex consequatur, quasi pariatur incidunt at alias. Eaque voluptates, quibusdam a quae pariatur voluptatibus eos illum nostrum mollitia eum atque, debitis aspernatur!</p>
           </div>
       </section>
       <h1>Mas sobre nosotros</h1>
       <div class="iconos-nosotros">
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
<?php incluirTemplate('footer');?>