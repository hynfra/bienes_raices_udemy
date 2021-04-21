<fielset>
               <legend>Informacion general</legend>
               <label for="titulo">Titulo</label>
               <input type="text" id="titulo" placeholder="titulo propiedad" name="propiedad[titulo]" value="<?php  echo s($propiedad->titulo);?>"><!--se coloca en value la variable para que al equivocarse en algun campo este no se borre-->
                <label for="precio">precio</label>
               <input type="number" id="precio" placeholder="precio propiedad" name="propiedad[precio]" value="<?php  echo s($propiedad->precio);?>">
               <label for="imagen">imagen:</label>
               <!--phpinfo();  se puede saber donde esta la ubicacion del tamaño permitido y se puede cambiar se llama load_max_size-->
               <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]"><!--accept="image/jpeg, image/png" es para indicar los archivos que se aceptan en el file-->
               
                 <?php if($propiedad->imagen): ?>  
                    <img src="../../imagenes/<?php  echo s($propiedad->imagen);?>" alt="" class="imagen-small">
               <?php endif; ?>
               <label for="descripcion">Descripcion:</label>
               <textarea id="descripcion" cols="30" rows="10" name="propiedad[descripcion]"><?php  echo s($propiedad->descripcion);?></textarea>
           </fielset>
           <fielset>
               <legend>informacion propiedad</legend>
               <label for="habitaciones">habitaciones</label>
               <input type="number" id="habitaciones" placeholder="ej: 3" min="1" max="9" name="propiedad[habitaciones]" value="<?php  echo s($propiedad->habitaciones);?>">
                <label for="wc">baños</label>
               <input type="number" id="wc" placeholder="ej: 3" min="1" max="9" name="propiedad[wc]" value="<?php  echo s($propiedad->wc);?>">
                <label for="estacionamiento">estacionamiento</label>
               <input type="number" id="estacionamiento" placeholder="ej: 3" min="1" max="9" name="propiedad[estacionamiento]" value="<?php  echo s($propiedad->estacionamiento);?>">
           </fielset>
           <fielset>
               <legend>Vendedor</legend>
               <label for="vendedor">Vendedor</label>
              
               <select name="propiedad[vendedorId]" id="vendedor">
               <option value="" selected><----Seleccione----></option>
                   <?php foreach($vendedores as $vendedor){// vendedores viene de la clase vendedor en el crear.php?>
                    <option 
                    <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : '';// esto es para que al enviar incorrectamente el formulario se guarde el usuario escogido ?>
                    value="<?php echo s($vendedor->id); ?>"><?php echo s($vendedor->nombre). " " . s($vendedor->apellido);// es con -> por son objetos?></option>
                   <?php }?>
               </select>
           </fielset>
           