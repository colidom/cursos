<?php

class Database
{
    public $connection;

    public function __construct()
    {
        // Connection to MySQL database
        $dsn = "mysql:host=localhost;port=3306;user=colidom;password=Mysql2023;dbname=PHPForBeginners;charset=utf8mb4";
        $this->connection = new PDO($dsn);
    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;
    }
}
