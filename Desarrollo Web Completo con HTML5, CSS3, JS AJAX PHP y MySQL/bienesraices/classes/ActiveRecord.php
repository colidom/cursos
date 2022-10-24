<?php

namespace App;

class ActiveRecord
{
    // Base de datos
    protected static $db;
    // Mapeamos el objeto
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];
    protected static $tabla = '';

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
    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/n/m');
        $this->vendedorId = $args['vendedorId'] ?? 1;
    }

    public function guardar()
    {
        if (!is_null($this->id)) {
            // Actualizar
            $this->actualizar();
        } else {
            // Crear un nuevo registro
            $this->crear();
        }
    }

    public function crear()
    {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();


        // Insertar en la base de datos
        $query = "INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);

        // Mensaje de exito
        if ($resultado) {
            // Redireccionamos al usuario tras insertar el registro en DB
            header("Location: /admin?resultado=1");
        }
        return $resultado;
    }

    public function actualizar()
    {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }
        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";
        $resultado = self::$db->query($query);

        if ($resultado) {
            // Redireccionamos al usuario tras insertar el registro en DB
            header("Location: /admin?resultado=2");
        }
    }

    // Eliminar un registro
    public function eliminar()
    {
        // Eliminar la propiedad en la DB
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->borrarImagen();
            header('location: /admin?resultado=3');
        }
    }


    // Identificar y unir los atributos de la DB
    public function atributos()
    {
        $atributos = [];

        foreach (self::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    // Sanitizar los datos
    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    // Subida de archivos
    public function setImagen($imagen)
    {
        // Elimina la imagen previa
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }
        // Asignar al atributo de imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    // Borrado de archivos
    public function borrarImagen()
    {
        // Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    // Validación
    public static function getErrores()
    {
        return self::$errores;
    }

    public function validar()
    {
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

        if (!$this->imagen) {
            self::$errores[] = "Debes añadir una imagen";
        }

        return self::$errores;
    }

    // Lista todos los registros
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL(($query));

        return $resultado;
    }

    // Busca un registro por su id
    public static function find($id)
    {

        $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";
        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }

    public static function consultarSQL($query)
    {
        // Consultar la DB
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = self::crearObjeto($registro);
        }

        // Liberar memoria
        $resultado->free();

        // Retornar resultados
        return $array;
    }

    // Método para mapear array a objeto
    protected static function crearObjeto($registro)
    {
        // new self = clase padre, es decir, Propiedad
        $objeto = new self;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    // Sincronizar el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
