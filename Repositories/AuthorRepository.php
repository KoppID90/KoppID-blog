<?php

namespace Repositories;

require_once REPOSITORY_PATH . '/Repository.php';

class AuthorRepository extends Repository
{
    protected $table = 'author';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllAuthors()
    {
        $query = "SELECT * FROM `author`";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll($this->returnType);
    }

    public function getAuthorById($id)
    {
        $sql = 'SELECT * FROM `author` WHERE `id` = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch($this->returnType);
    }

    public function createAuthor($name, $status, $email, $hashedPassword)
    {
        $query = "INSERT INTO `author` (`name`, `status`, `email`, `password`) 
        VALUES (:name, :status, :email, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();

        return $this->conn->lastInsertId();
    }

    public function updateAuthor($author)
    {
        $sql = "UPDATE `author` 
              SET   `name` = :name, 
                    `email` = :email, 
                    `status` = :status 
              WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $author['id'],
            'name' => $author['name'],
            'email' => $author['email'],
            'status' => $author['status']
        ]);
        return $this->getAuthorById($author['id']);
    }



    public function statusChange($id, $status)
    {
        $sql = sprintf('UPDATE `author` SET `status` = :status WHERE `id` = :id', $this->table);
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'status' => $status,
        ]);
    }

    public function deleteAuthor($id)
    {
        $query = "DELETE FROM `author` WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

}