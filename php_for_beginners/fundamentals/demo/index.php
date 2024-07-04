<?php

$name = 'Laracasts';
$cost = 15;

$bussiness = [
    'name' => 'Laracasts',
    'cost' => 15,
    'categories' => ['Testing', 'PHP', 'JavaScript']
];

if ($bussiness['cost'] > 90) {
    echo "Not interested";
}

foreach ($bussiness['categories'] as $category) {
    echo $category . '</br>';
}

function register($user)
{
    // Create the use record in the database.

    // Log them in

    // Send a welcome email

    // Redirect to their new dashboard
}

require 'index.view.php';
