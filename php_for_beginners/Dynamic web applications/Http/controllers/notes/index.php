<?php

use Core\App;

$db =App::resolve(Core\Database::class);

$notes = $db->query("SELECT * FROM notes")->findAll();

view('notes/index.view.php', [
    'heading' => "My Notes",
    'notes' => $notes
]);
