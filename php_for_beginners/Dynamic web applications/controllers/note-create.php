<?php

$heading = "Create Note";

$config = require 'config.php';
$db = new Database($config['database'], $config['credentials']['username'], $config['credentials']['password']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitiza las entradas del usuario
    $title = filter_string_polyfill($_POST['title']);
    $body = filter_string_polyfill($_POST['body']);
    $user_id = filter_var($_SESSION['user_id'] ?? 1, FILTER_VALIDATE_INT);

    if (empty($title)) {
        $errors['title'] = 'A title is required';
    }
    if (strlen($title) > 64 ) {
        $errors['title'] = 'The title can not be longer than 64 characters';
    }

    if (strlen($body) > 255 ){
        $errors['body'] = 'The body can not be longer than 255 characters';
    }

    if (empty($body)) {
        $errors['body'] = 'A body is required';
    }

    if (empty($errors) && $user_id) {
        // Prepara y ejecuta la consulta de inserción
        $db->query('INSERT INTO notes (title, body, user_id) VALUES (:title, :body, :user_id)', [
            ':title' => $title,
            ':body' => $body,
            ':user_id' => $user_id
        ]);

        // Redirecciona a la página de notas
        header('Location: /notes');
        die(); // Detiene la ejecución del script después de la redirección
    }
}

require 'views/note-create.view.php';
