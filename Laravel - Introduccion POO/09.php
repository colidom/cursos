<?php
include 'includes/header.php';

// Getters y Setters
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
    public function getApellido()
    {
        return $this->apellido;
    }

    public function setNombre($nombre)
    {
        return $this->nombre = $nombre;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

}

$empleado1 = new Empleado("Carlos", "Oliva", "IT", "colidom@outlook.com", 006);

var_dump("Empleado: {$empleado1->getCodigo()} {$empleado1->getNombre()} {$empleado1->getApellido()}");
