<?php

use Core\App;

$db =App::resolve(Core\Database::class);

$notes = $db->query("SELECT * FROM notes")->findAll();

if (!$notes) {
    // Manejo de error si no se encuentran notas
    die('No notes found');
}

view('notes/index.view.php', [
    'heading' => "My Notes",
    'notes' => $notes
]);
