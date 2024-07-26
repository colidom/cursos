<?php

$heading = "Create Note";

$config = require 'config.php';
$db = new Database($config['database'], $config['credentials']['username'], $config['credentials']['password']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitiza las entradas del usuario
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $user_id = filter_var($_SESSION['user_id'] ?? 1, FILTER_VALIDATE_INT);

    if ($title && $body && $user_id) {
        // Prepara y ejecuta la consulta de inserción
        $db->query('INSERT INTO notes (title, body, user_id) VALUES (:title, :body, :user_id)', [
            ':title' => $title,
            ':body' => $body,
            ':user_id' => $user_id
        ]);

        // Redirecciona a la página de notas
        header('Location: /notes');
        die(); // Detiene la ejecución del script después de la redirección
    } else {
        echo "Title, body, and user ID are required!";
    }
}

require 'views/note-create.view.php';
