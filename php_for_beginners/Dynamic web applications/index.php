<?php

require 'functions.php';
//require 'router.php';

// Connection to MySQL database
class Person
{
    public $name;
    public $age;

    public function breathe()
    {
        echo $this->name . " is breathing...";
    }
}

$person = new Person();
$person->name = 'John Doe';
$person->age = 30;

dd($person->breathe());
