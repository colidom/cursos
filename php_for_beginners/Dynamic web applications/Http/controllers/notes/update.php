<?php

use Core\App;
use Core\Database;

$db =App::resolve(Database::class);

$currentUserId = 1;

$id = $_POST['id'] ?? null;
if (!$id) {
    view('404.php');
}

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    ':id' => $id
])->findOrFail();

$db->authorize($note['user_id'] === $currentUserId);

list($errors, $title, $body, $user_id) = validate_post_data($_POST);

if (count($errors)) {
    view('notes/edit.view.php', [
        'header' => 'Edit Note',
        'note' => $note,
        'errors' => $errors
    ]);
}

$db->query("UPDATE notes SET title = :title, body = :body WHERE id = :id", [
    ':id' => $id,
    ':title' =>  $title,
    ':body' => $body
]);

header('Location: /notes');
die();
