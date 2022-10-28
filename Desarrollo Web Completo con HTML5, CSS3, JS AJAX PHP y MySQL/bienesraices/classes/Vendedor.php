<?php

namespace App;

class Vendedor extends ActiveRecord
{
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$errores[] = "Debes añadir un nombre";
        }
        if (!$this->apellido) {
            self::$errores[] = "Debes añadir un apellido";
        }
        if (!$this->telefono) {
            self::$errores[] = "Debes añadir un teléfono";
        }
        // Validación de teléfono
        if (!preg_match('/(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}/', $this->telefono)) {
            self::$errores[] = "El formato del número de teléfono es inválido";
        }
        return self::$errores;
    }

}
