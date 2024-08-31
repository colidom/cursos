<?php

use Core\App;

$db =App::resolve(Core\Database::class);

$id = $_GET['id'] ?? null;

if (!$id) {
    view('404.php');
}

$currentUserId = 1;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    ':id' => $id
])->findOrFail();

$db->authorize($note['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id', [
    ':id' => $id
]);

header('Location: /notes');
exit();
