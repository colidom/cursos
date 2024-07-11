<?php

require 'functions.php';
require 'router.php';

// Connection to MySQL database
class Person
{
    public $name;
    public $age;

    public function breathe()
    {
    }
}

$person = new Person();
$person->name = 'John Doe';
$person->age = 30;
