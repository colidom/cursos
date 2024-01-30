<?php
include 'includes/header.php';

// Métodos
class Empleado
{

    public function __construct(
        public $nombre,
        public $apellido,
        public $departamento,
        public $email,
        public $codigo,
    ) {}

    public function nombreEmpleado()
    {
        echo "{$this->nombre} {$this->apellido}";
    }

    public function departamentoEmpleado()
    {
        return $this->departamento;
    }
}

$empleado1 = new Empleado("Carlos", "Oliva", "IT", "colidom@outlook.com", 006);
$empleado2 = new Empleado("Javier", "Oliva", "IT", "jolidom@outlook.com", 007);

echo "<pre>";
$empleado1->nombreEmpleado();
echo "<br>";
echo "Departamento: " . $empleado1->departamentoEmpleado();
echo "</pre>";
