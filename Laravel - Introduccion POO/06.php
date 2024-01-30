<?php
include 'includes/header.php';

// Constructor property promotion
class Empleado
{

    public function __construct(
        public $nombre,
        public $apellido,
        public $departamento,
        public $email,
        public $codigo,
    ) {

    }
}

$empleado1 = new Empleado("Carlos", "Oliva", "IT", "colidom@outlook.com", 006);
$empleado2 = new Empleado("Javier", "Oliva", "IT", "jolidom@outlook.com", 007);

echo "<pre>";
var_dump($empleado1);
var_dump($empleado2);
echo "</pre>";
