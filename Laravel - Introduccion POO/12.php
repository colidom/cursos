<?php
include 'includes/header.php';
include 'includes/util.php';

// Métodos estáticos
abstract class Persona
{
    protected static string $nombre;
    protected string $apellido;
    protected string $telefono;
    protected string $email;

    public function __construct($nombre, $apellido, $telefono, $email) {
        self::$nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->email = $email;
    }

    public function mostrarInformacion(): void
    {
        echo "Nombre: " . self::$nombre . " $this->apellido Email: $this->email";
    }

    public function getTelefono(): string
    {
        return $this->telefono;
    }
}

class Empleado extends Persona
{
    protected string $codigo;
    protected string $departamento;

    public function __construct(
        string $nombre,
        string $apellido,
        string $telefono,
        string $email,
        string $codigo,
        string $departamento
    ) {
        parent::__construct($nombre, $apellido, $telefono, $email);
        $this->codigo = $codigo;
        $this->departamento = $departamento;
    }

    public static function obtenerEmpleado(): void
    {
        echo "Desde método estático";
    }

    public static function getNombre() {
        return self::$nombre;
    }
}

Empleado::obtenerEmpleado();
$empleado = new Empleado("Carlos", "Oliva", "IT", "colidom@outlook.com", "006", "IT");

echo Empleado::getNombre();
