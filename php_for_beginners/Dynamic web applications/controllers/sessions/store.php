<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST["email"];
$password = $_POST["password"];

$db = App::resolve(Database::class);

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = "Please provide a valid email address";
}

if (!empty($errors)){
    view('sessions/create.view.php', [
        "errors" => $errors
    ]);
}

$user = $db->query('select * from users where email = :email', [
    'email'=> $email
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'email'=> $email
        ]);
        header('location: /');
        exit();
    }
}

view('sessions/create.view.php', [
    "errors" => [
        'email' => 'No matching account found for that email address and password!'
    ]
]);
