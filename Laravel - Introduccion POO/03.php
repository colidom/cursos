<?php
include 'includes/header.php';

class Empleado
{
    public $nombre;
    public $apellido;
    public $departamento;
    public $email;
    public $codigo;
}

$empleado1 = new Empleado;
$empleado1->nombre = "Carlos";
$empleado1->apellido = "Oliva";
$empleado1->departamento = "IT";
$empleado1->email = "colidom@outlook.com";
$empleado1->codigo = "C06";

echo "<pre>";
var_dump($empleado1);
echo "</pre>";
