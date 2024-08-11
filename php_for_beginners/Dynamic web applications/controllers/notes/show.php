<?php

$heading = "My Note";

$config = require 'config.php';
$db = new Database($config['database'], $config['credentials']['username'], $config['credentials']['password']);

$id = $_GET['id'] ?? null;

if (!$id) {
    require 'views/404.php';
}

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    ':id' => $id
])->findOrFail();

$currentUserId = 1;

$db->authorize($note['user_id'] === $currentUserId);

require 'views/notes/show.view.php';
