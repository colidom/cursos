<?php

use Core\App;
use Core\Database;

$db =App::resolve(Database::class);

$id = $_GET['id'] ?? null;
if (!$id) {
    view('404.php');
}

$currentUserId = 1;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    ':id' => $id
])->findOrFail();

$db->authorize($note['user_id'] === $currentUserId);

view('notes/edit.view.php', [
    'heading' => "Edit Note",
    'errors' => [],
    'note' => $note
]);

