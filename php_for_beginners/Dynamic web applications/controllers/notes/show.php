<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database'], $config['credentials']['username'], $config['credentials']['password']);

$id = $_GET['id'] ?? null;
if (!$id) {
    view('404.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->query('delete from notes where id = ?', [$id]);
    // Redirecciona a la página de notas
    header('Location: /notes');
    die(); // Detiene la ejecución del script después de la redirección
} else {
    $currentUserId = 1;
    $note = $db->query("SELECT * FROM notes WHERE id = :id", [
        ':id' => $id
    ])->findOrFail();

    $db->authorize($note['user_id'] === $currentUserId);

    view('notes/show.view.php', [
        'heading' => "My Note",
        'note' => $note
    ]);
}
