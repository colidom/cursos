<?php

use \Core\Validator;
use \Core\Database;
use \Core\App;

$email = $_POST["email"];
$password = $_POST["password"];

// Validate the form inputs
$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = "Please provide a valid email address";
}

if (!Validator::string($password, 8, 32)) {
    $errors['password'] = "Please provide a valid password. Min 7 and max 32 characters";
}

if (!empty($errors)){
    return view('registration/create.view.php', [
        "errors" => $errors
    ]);
}

$db = App::resolve(Database::class);

// Check if the account already exists
$user = $db->query('SELECT * FROM users WHERE email = :email',[
    'email' => $email
])->find();

// If yes, redirect to login page
if ($user) {
    header('location: /');
    exit();
} else {
    // if not, save on the database, and then log the user in, and redirect
    $db->query('INSERT INTO users (email, password) VALUES (:email, :password)',[
        'email' => $email,
        'password' => $password
    ]);

    // Mark the user has logged in
    $_SESSION['user'] = [
        'email' => $email
    ];
    header('location: /');
    exit();
}
