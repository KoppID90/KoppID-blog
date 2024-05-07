<?php

namespace Repositories;

require_once 'Config\bootstrap.php';

class Repository
{
    protected $conn;

    protected $table;

    protected $returnType = null;

    public function __construct()
    {
        $connString = sprintf('mysql:host=%s;dbname=%s;charset=%s', DB_HOST, DB_DATABASE, DB_CHARSET);
        $this->conn = new \PDO($connString, DB_USER, DB_PASS);
        $this->returnType = \PDO::FETCH_ASSOC;
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}