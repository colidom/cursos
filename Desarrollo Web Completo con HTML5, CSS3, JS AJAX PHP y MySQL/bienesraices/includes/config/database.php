<?php

function conectarDB() : mysqli
{
    $db = mysqli_connect('localhost', 'colidom', 'Mysql2021', 'bienesraices_crud');

    if (!$db) {
        echo "Error! No se pudo conectar con la Base de datos";
        exit;
    } 
    return $db;
}
