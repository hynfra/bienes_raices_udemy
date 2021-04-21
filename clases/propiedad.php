<?php

namespace App;

class Propiedad extends activeRecord{
    protected static $tabla = 'propiedades';
    protected static $columnasDB =
     ['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado'];// permite identificar las columnas de los datos

     public $id;
     public $titulo;
     public $precio;
     public $imagen;
     public $descripcion;
     public $habitaciones;
     public $wc;
     public $estacionamiento;
     public $creado;
     public $vendedorId; 

     public function __construct($args = []){// establece la variable args como arreglo
        $this->id = $args['id'] ?? null; // en caso que no se defina pone un string vacio
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
        //self es para estaticos y this son para objetos no se pueden cambiar de esos roles
    }
    public function validar(){
       //validar datos, heredara validar y get errores de activeRecord
    if(!$this->titulo){
        self::$errores[] = "debes añadir un titulo";
    }
    if(!$this->precio){
        self::$errores[] = "debes añadir un precio";
    }
     if(strlen($this->descripcion) < 50){
        self::$errores[] = "debes añadir una descripcion con 50 caracteres";
    }
     if(!$this->habitaciones){
        self::$errores[] = "el numero de habitaciones es obligatorio";
    }
    if(!$this->wc){
        self::$errores[] = "el numero de baños es obligatorio";
    }
    if(!$this->estacionamiento){
        self::$errores[] = "el numero de estacionamientos es obligatorio";
    }
    if(!$this->vendedorId){
        self::$errores[] = "Debe asignar un vendedor";
    }
    if(!$this->imagen){// el array con name se saca de los atributos de la imagen, el cual se puede ver con el comando var_dump(imagen), con esto se verifica que se envio la imagen ya que si no existe el nombre quere decir que no se envio, y ademas que esta no pesa mas de 2 megas ya que al superar esa cantidad lanza error 
       self::$errores[] = "La imagen es de la propiedad es obligatoria";
   }
   return self::$errores;
   }
 }