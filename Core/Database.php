<?php

namespace Core;

use PDO;
use PDOStatement;

class Database
{
    public PDO $connection;
    public PDOStatement $statement;

    public function __construct($config, $username, $password)
    {
        $dsn = "mysql:" . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = []): static
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function find(): bool|array {
        return $this->statement->fetch();
    }

    public function findOneOrFail(): bool|array {
        $result = $this->statement->fetch();
        if (!$result) {
            abort();
        }
        return $result;
    }

    public function findAll(): bool|array {
        return $this->statement->fetchAll();
    }

    public function findAllOrFail(): bool|array {
        $results = $this->statement->fetchAll();
        if (!$results) {
            abort();
        }
        return $results;
    }
}