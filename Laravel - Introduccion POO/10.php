<?php
include 'includes/header.php';

// Herencia
class Empleado
{
    public function __construct(
        protected $nombre,
        protected $apellido,
        protected $email,
        protected $telefono,
        protected $codigo,
        protected $departamento
    ) {}

    public function mostrarInformacion()
    {
        echo "Nombre: {$this->nombre} {$this->apellido} Email: {$this->email}";
    }

}

class Proveedor
{
    public function __construct(
        protected $nombre,
        protected $apellido,
        protected $email,
        protected $telefono,
        protected $empresa
    ) {}

    public function mostrarInformacion()
    {
        echo "Nombre: {$this->nombre} {$this->apellido} Email: {$this->email}";
    }
}

$empleado = new Empleado("Carlos", "Oliva", "colidom@outlook.com", 666666666, "001", "IT");
$empresa = new Empleado("Jhon", "Doe", "jhondoe@outlook.com", 777777777, "002", "IT");

echo "<pre>";
var_dump($empleado);
echo "</pre>";

$empleado->mostrarInformacion();

echo "<pre>";
var_dump($empresa);
echo "</pre>";

$empresa->mostrarInformacion();
