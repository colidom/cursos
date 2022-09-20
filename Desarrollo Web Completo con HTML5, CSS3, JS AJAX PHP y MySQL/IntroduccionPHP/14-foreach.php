<?php include 'includes/header.php';

$productos = [
    [
        'nombre' => 'Tablet',
        'precio' => 200,
        'disponible' => true
    ],
    [
        'nombre' => 'Televisión',
        'precio' => 300,
        'disponible' => true
    ],
    [
        'nombre' => 'Monitor',
        'precio' => 400,
        'disponible' => false
    ]
];

// HTML en PHP
/* foreach($productos as $producto) {
    echo "<li>";
    var_dump("Título del producto: " . $producto['nombre']);
    echo "</li>";
} */

//PHP en HTML
foreach($productos as $producto) { ?>
   <li>
        <p>Producto: <?php echo $producto['nombre'] ?></p>
        <p>Precio: <?php echo $producto['precio'] ?>€</p>
        <!-- Operador ternario -->
        <p><?php echo ($producto['disponible']) ? 'Disponible' : 'No disponible'; ?></p>
        <!-- Fin Operador ternario -->
        <?php 
            if($producto['disponible']) {
                echo "<p>Disponible</p>";
            } else {
                echo "<p>No disponible</p>";
            }
        ?>
   </li>
    <?php

}

include 'includes/footer.php';
