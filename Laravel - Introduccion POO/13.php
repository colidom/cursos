<?php
include 'includes/header.php';
include 'DB.php';

// Comunicar dos Clases
class Empleado
{

    public function __construct(
        protected $nombre,
        public $apellido,
        public $departamento,
        public $email,
        public $codigo,
    ) {}

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        return $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        return $this->apellido = $apellido;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }
}

$empleado1 = new Empleado("Carlos", "Oliva", "IT", "colidom@outlook.com", 006);
$nombre = $empleado1->getNombre();

$db = new DB($nombre);
var_dump($db);
$db->guardar();