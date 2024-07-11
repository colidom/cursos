<?php

require 'functions.php';
//require 'router.php';

// Connection to MySQL database
$dsn = "mysql:host=localhost;port=3306;user=colidom;password=Mysql2023;dbname=PHPForBeginners;charset=utf8mb4";

// Asignar la instancia de PDO a la variable $pdo
$pdo = new PDO($dsn);

$statement = $pdo->prepare("select * from posts");
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
dd($posts);
