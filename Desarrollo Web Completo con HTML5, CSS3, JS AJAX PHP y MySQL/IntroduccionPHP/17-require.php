<?php
// Distintas formas de include
include 'includes/header.php'; // Recomendado para incluir ficheros como tpl, css
include ('includes/header.php'); 
require 'includes/header.php'; // Recomendado para incluir funciones, clases
require ('includes/header.php');
require_once 'includes/header.php'; // Si ya se ha incluido, no lo incluye nuevamente
require_once 'funciones.php';

iniciarApp();





include 'includes/footer.php';