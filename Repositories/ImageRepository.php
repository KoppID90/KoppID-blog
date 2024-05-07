<?php

namespace Repositories;

require_once REPOSITORY_PATH . '/Repository.php';

class ImageRepository extends Repository
{
    protected $table = 'images';

    public function __construct()
    {
        parent::__construct();
    }


    public function getById($id): array
    {
        $sql = sprintf('SELECT * FROM %s WHERE `id` = :id', $this->table);
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch($this->returnType);
    }

    public function create($data): int
    {
        $sql = sprintf(
            "
                INSERT INTO `%s` 
                    (`name`, `original_name`, `extension`, `size`, `created_at`) 
                VALUES 
                    (:name, :original_name, :extension, :size, :created_at)
            ",
            $this->table
        );
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);

        return $this->conn->lastInsertId();
    }
}