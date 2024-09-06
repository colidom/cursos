<?php

use Core\App;
use Core\Database;
use Core\Validator;

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

$errors = [];
$title = filter_string_polyfill($_POST['title']);
$body = filter_string_polyfill($_POST['body']);
$user_id = filter_var($_SESSION['user_id'] ?? 1, FILTER_VALIDATE_INT);

if (empty($title)) {
    $errors['title'] = 'A title is required';
}

if (!Validator::string($_POST['title'], 1, 64)) {
    $errors['title'] = 'The title can not be longer than 64 characters';
}

if (!Validator::string($_POST['body'], 1, 255)) {
    $errors['body'] = 'The body can not be longer than 255 characters';
}

if (empty($body)) {
    $errors['body'] = 'A body is required';
}

if (count($errors)) {
    return view('notes/edit.view.php', [
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
