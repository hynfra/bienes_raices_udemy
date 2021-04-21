<?php require 'includes/app.php';//require es para codigo importante que es vital para que funcione toro

incluirTemplate('header');// se pasa el nombr edel template que estamos tratando de llamar?>
   <main class="contenedor seccion">
       <h1 data-cy="heading-contacto">Contacto</h1>
       <picture>
           <source srcset="build/img/destacada3.webp" type="image/webp">
           <source srcset="build/img/destacada3.jpg" type="image/jpeg">
           <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen contacto">
       </picture>
       <h2 data-cy="heading-formulario">Llene el formulario</h2>
       <form action="" class="formulario" data-cy="formulario-contacto">
           <fieldset>
               <legend>informacion personal</legend>
               <label for="nombre">nombre</label>
               <input data-cy="input-nombre" type="text" placeholder="tu nombre" id="nombre">
                <label for="email">email</label>
               <input type="email" placeholder="tu email" id="email">
               <label for="telefono">telefono</label>
               <input type="tel" placeholder="tu telefono" id="telefono">
               <label for="mensaje">mensaje</label>
               <textarea data-cy="input-mensaje" name="" id="mensaje" cols="30" rows="10"></textarea>
           </fieldset>
           <fieldset>
               <legend>información sobre la propiedad</legend>
                <label for="opciones">vende o compra</label>
                <select data-cy="input-opciones"name=""  id="opciones">
                   <option value="" disabled selected> -- Seleccione --</option><!--desactiva esta opcion, para que solo pueda ser vista-->
                    <option value="compra">compra</option>
                    <option value="vende">vende</option>
                </select>
                <label for="presupuesto">Precio o presupuesto</label>
                <input data-cy="input-precio" type="text" placeholder="tu precio o presupuesto" id="presupuesto">
           </fieldset>
           <fieldset>
               <legend>Informacion sobre la propiedad</legend>
               <p>Como desea ser contactado</p>
               <div class="forma-contacto">
                   <label for="contactar-telefono">Telefono</label>
                   <input data-cy="forma-contacto" name="contacto"  type="radio" value="telefono" id="contactar-telefono">
                      <label for="contactar-email">Email</label>
                   <input data-cy="forma-contacto"  name="contacto" type="radio" value="email" id="contactar-email">
               </div>
               <p>Si eligio telefono, elija la fecha y hora para ser contactado</p>
                <label for="fecha">fecha:</label>
                <input data-cy="input-fecha" type="date" id="fecha">
                 <label for="hora">hora:</label>
                <input data-cy="input-hora"type="time" id="hora"  min="09:00" max="18:00" placeholder="tu telefono">  
           </fieldset>
           <input type="submit" value="enviar" class="boton-verde">
       </form>
   </main>
<?php incluirTemplate('footer');?>