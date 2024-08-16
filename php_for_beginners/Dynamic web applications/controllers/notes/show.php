<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database'], $config['credentials']['username'], $config['credentials']['password']);

$id = $_GET['id'] ?? null;

if (!$id) {
    require 'views/404.php';
}

$currentUserId = 1;
$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    ':id' => $id
])->findOrFail();

$db->authorize($note['user_id'] === $currentUserId);

view('notes/show.view.php', [
    'heading' => "My Note",
    'note' => $note
]);

