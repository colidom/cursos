<?php

require 'app.php';

function incluirTemplate( string $nombre, bool $inicio = false) {
    include TEMPLATES_URL . "/${nombre}.php";
}

function estaAutenticado() {
    session_start();

    $auth = $_SESSION['login'];

    if ($auth) {
        return true;
    } else {
        return false;
    }
}
