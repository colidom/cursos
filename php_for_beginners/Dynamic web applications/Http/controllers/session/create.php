<?php

use Core\Session;

view('session/create.view.php', [
    'heading' => "Log In",
    'errors' => Session::get('errors')
]);