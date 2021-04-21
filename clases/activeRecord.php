<?php
namespace App;


class activeRecord {




    // base de datos
    protected static $db; //se necesita que se use dentro de la clase y que sea estatica para no generar multiples instancias
    protected static $columnasDB =[];// permite identificar las columnas de los datos, el cual esta definido en las clases heredadas
    protected static $tabla = '';// se llena en las clases que heredan de esta, los nombres de las tablas
    
     //errores
    protected static $errores = [];
   
    

    public static function setDB($database){// es estatico por que el atributo es estatico
        self::$db = $database;// self hace referencia a los atributos estaticos de la misma clase
        //cuand ose hace referencia a los atributos estaticos se debe poner v $
    }
   

    public function guardar(){
            if(!is_null($this->id)){
                   // crear un nuevo registro
                    $this->actualizar();
                  
                  
            }else{
                
                 $this->crear();
                   
            }
    }
    public function crear(){
        // sanitizar datos 
        $atributos = $this->sanitizarAtributos();
        //$string = join(', ', array_keys($atributos));// join crea un string a partir de un arreglo

       
        // insertar en la bd
        $query = "INSERT INTO " . static::$tabla . " ( ";
        $query.=join(', ', array_keys($atributos));
        $query.= " ) VALUES (' ";
        $query.=join("', '", array_values($atributos));// esto convierte el array de los valores enviados por el usuario en un string separado por , y agregando " y '
        $query.="  ') ";
        $resultado = self::$db->query($query);
        //debuguear($query);
        if($resultado){
            //redireccionar usuario, este codigo funciona solo fuera de HTML
             //query string, siempre comienza despues de ?
             header('Location:/admin?resultado=1');// mensaje=1 es lo que se enviara a traves de GET a la otra pagina, y en esta se recibira como mensaje
         }
    }
    public function actualizar(){
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach($atributos as $key => $value){
            $valores[] = "{$key}= '{$value}'";// agrega al arreglo cada nombre de fila con su atributo respectivo
        }
        $query = "UPDATE " . static::$tabla . " SET ";// siempre dejar un espacio entre las consultas SQL para evitar errores de sintaxis
        $query .= join(', ', $valores);// join agrega una , luego de cada arreglo
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";// se sanitiza la id y se recupera de la clase 
        $query .= " LIMIT 1";// se recomienza dar limit 1 para que solo traiga 1 valor de la tabla
        $resultado = self::$db->query($query);
        if($resultado){
            //redireccionar usuario, este codigo funciona solo fuera de HTML
             //query string, siempre comienza despues de ?
             header('Location:/admin?resultado=2');// mensaje=1 es lo que se enviara a traves de GET a la otra pagina, y en esta se recibira como mensaje
         }
    }

    public function eliminar(){
        
    // escape_string permite evitar que se agreguen datos maliciosos
        $query = "DELETE FROM " . static::$tabla . " WHERE id = ". self::$db->escape_string($this->id)." LIMIT 1";
      
       
        $resultado = self::$db->query($query);

        if($resultado){
            $this->borrarImagen();
            header("location:/admin/index.php?resultado=3");
         }
    }
    //identificar y unir los atributos de la BD
    public function atributos(){
        $atributos = [];
        // se cambio de self a static porque los self solo se usan cuando el metodo usa la db
        foreach(static::$columnasDB as $columna){// se usa self por que el atributo es estatico
           if($columna === 'id') continue; // hace que cuando salga id no lo agregue al arreglo de atributos, se salta ese loop con continue
            $atributos[$columna] = $this->$columna;// columna tiene $ porque hace referencia a una variable del foreach, no  a un atributo de la clase

        }
        return $atributos;
    }
   public function sanitizarAtributos(){
    $atributos = $this->atributos();
    $sanitizado = [];
   // sanitiza cada elemento debugeado
    foreach($atributos as $key => $value){ // key es la columna y value lo que escribio el usuario
        $sanitizado[$key] = self::$db->escape_string($value);// escape_string es un metodo de la clase mysqli que evita que se ingresen cosas distintas a string
        }
        return $sanitizado;
    }
    // subida de archivos
    public function setImagen($imagen){
        // elimina imagen previa 
        if(!is_null($this->id)){// si hay una id quiere decir que existe una imagen
        
           $this->borrarImagen();
        }
        // asignar a atributo el nombre de la imagen
        if($imagen){
            $this->imagen = $imagen;
        }
    }

    public function borrarImagen(){
         //eliminar archivo
         $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
         if($existeArchivo){
             unlink(CARPETA_IMAGENES.$this->imagen);
         }
       
    }
   // validacion
   public static function getErrores(){// recordar es estatico por que la variable lo es y se usa self por lo mismo
       
    
        return static::$errores;
   }
   public function validar(){
    //validar datos
    static::$errores = [];
    return static::$errores;// self hace referencia a la clase heredada, por lo que se debe cambiar a static
    }
    
   // lista todas la propiedad
   public static function all(){

    $query = "SELECT * FROM ". static::$tabla;// static hace referencia a la variable que esta en todas las clases heredadas
    $resultado = self::consultarSQL($query);
    
    return $resultado;
   }
// obtiene un determinado numero de registros
   public static function get($cantidad){

    $query = "SELECT * FROM ". static::$tabla . " LIMIT " . $cantidad;// static hace referencia a la variable que esta en todas las clases heredadas
    $resultado = self::consultarSQL($query);
    
    return $resultado;
   }
   //busca un registro por su id
   public static function  find($id){
    $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";
    $resultado = self::consultarSQL($query);
    return array_shift($resultado);// pasando el indice retorna solo el objeto de array
    //tambien con array_shift se retorna el primer elemento
    }
   public static function consultarSQL($query){
        // consultar la base de datos
        $resultado = self::$db->query($query);
        // iterar resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }
       
        //liberar memoria
        $resultado->free();
        //devolver resultados
        return $array;
   }
   protected static function crearObjeto($registro){// esta funcion recibira los arreglos de la bd y los devuelve como objetos
        $objeto = new static;// new self es la clase osea propieda en este caso, pero ahora que heredamos cambiamos a static para hacer referencia a otras clases
        
        foreach($registro as $key => $value){
            if(property_exists( $objeto, $key )){// si tiene una llave como id o tituitulo entra
                $objeto->$key = $value;
            }
        }
        return $objeto;

   }
   // sincroniza el objeto en memoria con los ccambios realizados
   public function sincronizar($args = []){
        foreach($args as $key => $value){// es un arreglo asociativo
            // verifica que el atributo exista y no este vacio
            if(property_exists($this, $key) && !is_null($value)){// this es el objeto actual y key es el valor escrito en el input
                $this->$key = $value;
                
            }
                
        }
   } 
}

