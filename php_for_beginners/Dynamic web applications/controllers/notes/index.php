<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database'], $config['credentials']['username'], $config['credentials']['password']);
$notes = $db->query("SELECT * FROM notes")->findAll();

if (!$notes) {
    // Manejo de error si no se encuentran notas
    die('No notes found');
}

view('notes/index.view.php', [
    'heading' => "My Notes",
    'notes' => $notes
]);
