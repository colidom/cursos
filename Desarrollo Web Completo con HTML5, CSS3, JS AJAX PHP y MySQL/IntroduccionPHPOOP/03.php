<?php 
declare( strict_types =  1);

use Producto as GlobalProducto;

include 'includes/header.php';

// Métodos estáticos 
class Producto {

    public $imagen;
    public static $imagenPlaceholder = "Imagen.png";
    public function __construct(protected string $nombre, public int $precio, public bool $disponible, string $imagen) {

        if ($imagen) {
            self::$imagenPlaceholder = $imagen;
        }
    }

    public static function obtenerImagenProducto() {
        return self::$imagenPlaceholder;
    }

    // Método estático
    public static function obtenerProducto() {
        echo "Obteniendo datos del producto...";
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
// Llamada método estático
echo Producto::obtenerProducto();
echo Producto::obtenerImagenProducto();

$producto = new Producto("Tablet", 499, true, 'MonitorCurvo.png');
echo "<pre>";
echo $producto->getNombre();
echo "</pre>";
echo $producto->setNombre('Smartphone');
echo $producto->obtenerImagenProducto();

echo "<pre>";
var_dump($producto);
echo "</pre>";

include 'includes/footer.php';