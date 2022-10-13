<?php 
declare( strict_types =  1);

include 'includes/header.php';

// Abstracción
// Definir una clase
class Producto {


    // PHP = V8
    public function __construct(public string $nombre, public int $precio, public bool $disponible)
    {

    }
    // PHP < V8
    /* public $nombre;
    public $precio;
    public $disponible;

    public function __construct(string $nombre, int $precio, bool $disponible)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->disponible = $disponible;
    } */

    public function mostrarProducto() {
        echo "El producto es: " . $this->nombre . " y su precio es de: " . $this->precio . "€";
    }
}

$producto = new Producto("Tablet", 499, true);
$producto->mostrarProducto();

echo "<pre>";
var_dump($producto);
echo "</pre>";

$producto2 = new Producto("Monitor", 699, true);
$producto2->mostrarProducto();

echo "<pre>";
var_dump($producto2);
echo "</pre>";

include 'includes/footer.php';