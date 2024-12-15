<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST["email"];
$password = $_POST["password"];

$form = new LoginForm();

if ($form->validate($email, $password)) {
    if((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }
    $form->error('email','No matching account found for that email address and password');
}

//
//view('session/create.view.php', [
//    "errors" => $form->getErrors(),
//    "email" => $email,
//    "heading" => "Log In"
//]);

//view('session/create.view.php', [
//    'errors' => $form->errors()
//]);

Session::flash('errors', $form->errors());

redirect('/login');
