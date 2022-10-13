<?php 
declare( strict_types =  1);

include 'includes/header.php';

// Encapsulación 
class Producto {

    // Modificadores de acceso
    /* public:    Se puede acceder y modificar desde cualquier lugar(clase y objeto) */
    /* protected: Se puede acceder únicamente desde la clase */
    /* private:   Solo miembros de la misma clase pueden acceder a el */
    // PHP = V8
    public function __construct(protected string $nombre, public int $precio, public bool $disponible) {

    }
   
    public function mostrarProducto() :void {
        echo "El producto es: " . $this->nombre . " y su precio es de: " . $this->precio . "€";
    }

    public function getNombre() : string {
        return $this->nombre;
    }

    public function setNombre(string $nombre) {
        $this->nombre = $nombre;
    }
}

$producto = new Producto("Tablet", 499, true);
/* $producto->mostrarProducto(); */
echo "<pre>";
echo $producto->getNombre();
echo "</pre>";
echo $producto->setNombre('Smartphone');

echo "<pre>";
var_dump($producto);
echo "</pre>";

include 'includes/footer.php';