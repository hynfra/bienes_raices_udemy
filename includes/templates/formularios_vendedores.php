<fielset>
               <legend>Informacion general</legend>
               <label for="nombre">Nombre</label>
               <input type="text" id="nombre" placeholder="vendedor" name="vendedor[nombre]" value="<?php  echo s($vendedor->nombre);?>"><!--se coloca en value la variable para que al equivocarse en algun campo este no se borre-->
               <label for="apellido">apellido</label>
               <input type="text" id="apellido" placeholder="apellido" name="vendedor[apellido]" value="<?php  echo s($vendedor->apellido);?>">
</fielset>

<fielset>
               <legend>Informacion extra</legend>
               <label for="telefono">Telefono</label>
               <input type="text" id="telefono" placeholder="telefono" name="vendedor[telefono]" value="<?php  echo s($vendedor->telefono);?>">
</fielset>