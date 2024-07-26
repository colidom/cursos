<?php

$heading = "Create Note";

$config = require 'config.php';
$db = new Database($config['database'], $config['credentials']['username'], $config['credentials']['password']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'] ?? null;
    $body = $_POST['body'] ?? null;
    $user_id = $_SESSION['user_id'] ?? 1;

    if ($title && $body && $user_id) {
        // Prepara y ejecuta la consulta de inserción
        $db->query('INSERT INTO notes (title, body, user_id) VALUES (:title, :body, :user_id)', [
            ':title' => $title,
            ':body' => $body,
            ':user_id' => $user_id
        ]);

        header('Location: /notes');
    } else {
        echo "Title, body, and user ID are required!";
    }
}

require 'views/note-create.view.php';
