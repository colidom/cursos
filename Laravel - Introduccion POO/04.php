<?php
include 'includes/header.php';

class Empleado
{
    public $nombre;
    public $apellido;
    public $departamento;
    public $email;
    public $codigo;

    public function __construct($nombre, $apellido, $departamento, $email, $codigo)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->departamento = $departamento;
        $this->email = $email;
        $this->codigo = $codigo;
    }
}

$empleado1 = new Empleado("Carlos", "Oliva", "IT", "colidom@outlook.com", "C06");
$empleado2 = new Empleado("Javier", "Oliva", "IT", "jolidom@outlook.com", "C07");

echo "<pre>";
var_dump($empleado1);
var_dump($empleado2);
echo "</pre>";
