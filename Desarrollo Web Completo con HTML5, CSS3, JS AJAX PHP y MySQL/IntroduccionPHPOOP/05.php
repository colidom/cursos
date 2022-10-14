<?php

use Transporte as GlobalTransporte;

 include 'includes/header.php';

/* Clases abstractas no se pueden instanciar, solamente heredar (extends) */
abstract class Transporte {

    public function __construct(protected int $ruedas, protected int $capacidad) {
        
    }

    public function getInfo() : string {
        return "El transporte tiene " . $this->ruedas . " ruedas y una capacidad de " . $this->capacidad . " personas ";
    }

    public function getRuedas() : int {
        return $this->ruedas;
    }

}

class Bicicleta extends Transporte {
    
    /* Sobreescribir método al declararlo con el mismo nombre que en la clase padre(Transporte) */
    public function getInfo() : string {
        return "El transporte tiene " . $this->ruedas . " ruedas y una capacidad de " . $this->capacidad . " personas y no gasta gasolina";
    }
}

class Automovil extends Transporte {

    public function __construct(protected int $ruedas, protected int $capacidad, protected string $transmision) {
        
    }

    public function getTransmision() : string {
        return $this->transmision;
    }

}

echo "<hr>";
$bicicleta = new Bicicleta(2, 1);
echo $bicicleta->getInfo();
echo $bicicleta->getRuedas();
/* echo $bicicleta->getInformacion(); */
echo "<hr>";

$auto = new Automovil(4, 5, "Manual");
echo $auto->getInfo();
echo $auto->getRuedas();
echo $auto->getTransmision();
echo "<hr>";

include 'includes/footer.php';