<?php
include 'includes/header.php';

// Herencia
class Persona
{
    public function __construct(
        protected string $nombre,
        protected string $apellido,
        protected string $telefono,
        protected string $email
    ) {}

    public function mostrarInformacion(): void
    {
        echo "Nombre: $this->nombre $this->apellido Email: $this->email";
    }

    public function getTelefono(): string
    {
        return $this->telefono;
    }
}

class Empleado extends Persona
{
    public function __construct(
        string $nombre,
        string $apellido,
        string $telefono,
        string $email,
        protected string $codigo,
        protected string $departamento
    ) {
        parent::__construct($nombre, $apellido, $telefono, $email);
    }

}

class Proveedor extends Persona
{
    public function __construct(
        string $nombre,
        string $apellido,
        string $telefono,
        string $email,
        protected string $empresa
    ) {
        parent::__construct($nombre, $apellido, $telefono, $email);
    }

    public function mostrarInformacion(): void
    {
        echo "Nombre: $this->nombre $this->apellido Email: $this->email Empresa: $this->empresa";
    }

}

$empleado = new Empleado("Carlos", "Oliva", "666666666", "colidom@outlook.com", "001", "IT");
$proveedor = new Proveedor("Jhon", "Doe", "777777777", "jhondoe@outlook.com", "WWW");

echo "<pre>";
var_dump($empleado);
echo "</pre>";

$empleado->mostrarInformacion();
echo "</br>";
echo "Teléfono: " . $empleado->getTelefono();

echo "<pre>";
var_dump($proveedor);
echo "</pre>";

$proveedor->mostrarInformacion();
echo "</br>";
echo "Teléfono: " . $proveedor->getTelefono();
