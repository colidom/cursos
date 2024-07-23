<?php

$heading = "My Note";

$config = require 'config.php';
$db = new Database($config['database'], $config['credentials']['username'], $config['credentials']['password']);

$query = "select * from notes where id = ?";
$note = $db->query($query, [$_GET['id']])->findOrFail();

$currentCuserId = 1;

$db->authorize($note['user_id'] === $currentCuserId);

require 'views/note.view.php';
