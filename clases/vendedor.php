<?php

namespace App;

class Vendedor extends activeRecord{
    protected static $tabla = 'vendedores';
    protected static $columnasDB =['id','nombre','apellido','telefono'];// permite identificar las columnas de los datos

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = []){// establece la variable args como arreglo
        $this->id = $args['id'] ?? null; // en caso que no se defina pone un string vacio
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        //self es para estaticos y this son para objetos no se pueden cambiar de esos roles
    }
    public function validar(){{}
        //validar datos, heredara validar y get errores de activeRecord
     if(!$this->nombre){
         self::$errores[] = "debes añadir un nombre";
     }
     if(!$this->apellido){
         self::$errores[] = "debes añadir un apellido";
     }
      if(!$this->telefono){
         self::$errores[] = "el telefono es obligatorio";
     }
     // expresion regular para que solo se pueda ingresar numeros validos en telefono
     if(!preg_match('/[0-9]{9}/',$this->telefono)){// con esto indica que es una expresion fija (/) que acepta numeros del 0 al 9 ([0-9]) y que puede tener 10 digitos

        self::$errores[] = "formato no valido";
     }
     
    return self::$errores;
    }
}