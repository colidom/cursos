<?php

$heading = "My Notes";

$config = require 'config.php';
$db = new Database($config['database'], $config['credentials']['username'], $config['credentials']['password']);

$notes = $db->query('select * from notes')->findAll();

require 'views/notes.view.php';
