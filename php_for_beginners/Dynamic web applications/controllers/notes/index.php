<?php

$heading = "My Notes";

$config = require 'config.php';
$db = new Database($config['database'], $config['credentials']['username'], $config['credentials']['password']);

$notes = $db->query("SELECT * FROM notes")->findAll();

if (!$notes) {
    // Manejo de error si no se encuentran notas
    die('No notes found');
}

require 'views/notes/index.view.php';
