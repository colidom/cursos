<?php 

namespace App;

class Propiedad {

    // Base de datos
    protected static $db;
    // Mapeamos el objeto
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    // Errores
    protected static $errores = [];

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

    // Definir la conexión a la db
    public static function setDB($database) {
        self::$db = $database;
    }

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? 'imagen.jpg';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/n/m');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function guardar() {

        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $query = "INSERT INTO propiedades ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);

        // debuguear($resultado);
    }

    // Identificar y unir los atributos de la DB
    public function atributos() {
        $atributos = [];

        foreach (self::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    // Sanitizar los datos
    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    // Validación
    public static function getErrores()
    {
        return self::$errores;
    }

    public function validar() {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un título";
        }

        if (!$this->precio) {
            self::$errores[] = "Debes añadir un precio";
        }

        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "Debes añadir una descripción con al menos 50 caracteres";
        }

        if (!$this->habitaciones) {
            self::$errores[] = "El número de habitación es obligatorio";
        }

        if (!$this->wc) {
            self::$errores[] = "Debes añadir un WC";
        }

        if ($this->estacionamiento < 0) {
            self::$errores[] = "Debes añadir un estacionamiento";
        }

        if (!$this->vendedorId) {
            self::$errores[] = "Debes elegir un vendedor";
        }

        /* if (!$this->imagen['name'] || $this->imagen['error']) {
            self::$errores[] = "Debes añadir una imagen";
        }

        // Validar iagen por tamaño(100 kb máximo)
        $medida = 1000 * 1000;

        if ($this->imagen['size'] > $this->medida) {
            $errores[] = "La imagen es muy pesada";
        } */

        return self::$errores;
    }
}
