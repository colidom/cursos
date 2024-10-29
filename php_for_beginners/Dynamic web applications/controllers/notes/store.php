<?php

use Core\App;

$db =App::resolve(Core\Database::class);

list($errors, $title, $body, $user_id) = validate_post_data($_POST);

if (!empty($errors)) {
    view('notes/create.view.php', [
        'heading' => "Create Note",
        'errors' => $errors
    ]);
    return;
}

// Prepara y ejecuta la consulta de inserción
$db->query('INSERT INTO notes (title, body, user_id) VALUES (:title, :body, :user_id)', [
    ':title' => $title,
    ':body' => $body,
    ':user_id' => $user_id
]);

// Redirecciona a la página de notas
header('Location: /notes');
die(); // Detiene la ejecución del script después de la redirección
