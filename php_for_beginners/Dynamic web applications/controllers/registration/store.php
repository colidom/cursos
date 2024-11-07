<?php

use Core\Validator;
use Core\Database;
use Core\App;

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

// Validate the form inputs
$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = "Please provide a valid email address";
}

$errors = [];
if (!Validator::string($name, 3, 15)) {
    $errors['name'] = "Please provide a name";
}

if (!Validator::string($password, 8, 32)) {
    $errors['password'] = "Please provide a valid password. Min 7 and max 32 characters";
}

if (!empty($errors)){
    view('registration/create.view.php', [
        "errors" => $errors,
        "heading" => "Register"
    ]);
}

$db = App::resolve(Database::class);

// Check if the account already exists
$user = $db->query('SELECT * FROM users WHERE email = :email',[
    'email' => $email
])->find();

// If yes, redirect to login page
if (!$user) {
    // if not, save on the database, and then log the user in, and redirect
    $db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)', [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    // Mark the user has logged in
    login($user);

}

header('location: /');
exit();
