<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$email = $_POST["email"];
$password = $_POST["password"];

$db = App::resolve(Database::class);
$form = new LoginForm();

if (!$form->validate($email, $password)) {
    view('session/create.view.php', [
        "errors" => $form->getErrors(),
        "heading" => "Log In"
    ]);
}
$user = $db->query('select * from users where email = :email', [
    'email'=> $email
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login($user);
        header('location: /');
        exit();
    }
}

view('session/create.view.php', [
    "errors" => [
        'email' => 'No matching account found for that email address and password!'
    ],
    "heading" => "Log In"
]);
