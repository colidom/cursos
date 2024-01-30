<?php
include 'includes/header.php';

// Modificadores de Acceso
class Empleado
{
    // Public accesible desde cualquier lugar
    // Private: solo accesible dentro de la clase (por defecto)
    // Protected: accesible para los hijos y a quien le herede

    public function __construct(
        protected $nombre,
        public $apellido,
        public $departamento,
        public $email,
        public $codigo,
    ) {}

    public function obtenerNombre()
    {
        echo "Nombre original: {$this->nombre} <br>";
        return $this->nombre;
    }

    public function cambiarNombre($nombre)
    {
        echo "Cambiando nombre... <br>";
        return $this->nombre = $nombre;
    }

}

$empleado1 = new Empleado("Carlos", "Oliva", "IT", "colidom@outlook.com", 006);
$empleado1->obtenerNombre();
$nuevoNombre = $empleado1->cambiarNombre("Javier");
echo $nuevoNombre;
echo "<pre>";
var_dump($empleado1);
echo "</pre>";
