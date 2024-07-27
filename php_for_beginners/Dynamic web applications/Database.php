<?php

class Database
{
    public PDO $connection;
    public ?PDOStatement $statement = null;

    public function __construct($config, $username = 'root', $password = '')
    {
        // Connection to MySQL database
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = []): Database
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (!$result) abort();

        return $result;
    }

    public function findAll(): false|array
    {
        return $this->statement->fetchAll();
    }

    public function authorize($condition, $status = Response::FORBIDEN): void
    {
        if (!$condition) abort($status);
    }
}
