<?php

namespace Repositories;

require_once REPOSITORY_PATH . '/Repository.php';

class PostRepository extends Repository
{
    protected $table = 'article';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllArticles()
    {
        $query = "SELECT `post`.*, `author`.`name` AS `author_name`, `images`.`name` AS `image_name`, `images`.`extension` AS `image_extension`
        FROM `post` JOIN `author` ON `post`.`author_id` = `author`.`id` JOIN `images` ON `post`.`image_id` = `images`.`id` WHERE 1 ORDER BY `post`.`created_at` DESC";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll($this->returnType);
    }
    public function getAllArticlesDescByCreatedAt()
    {

        $sql = "SELECT  `post`.*, `author`.`name` AS `author_name`, `images`.`name` AS `image_name`, `images`.`extension` AS `image_extension`
        FROM `post` JOIN `author` ON `post`.`author_id` = `author`.`id` JOIN `images` ON `post`.`image_id` = `images`.`id` WHERE 1 ORDER BY `post`.`created_at` DESC";

        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll($this->returnType);
    }

    public function getArticleById($id)
    {
        $query = "SELECT `post`.*, `author`.`name` AS `author_name`, `images`.`name` AS `image_name`, `images`.`extension` AS `image_extension`
        FROM `post` 
        JOIN `author` ON `post`.`author_id` = `author`.`id` 
        JOIN `images` ON `post`.`image_id` = `images`.`id`
        WHERE `post`.`id` = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch($this->returnType);
    }

    //cikk létrehozása
    public function createArticle($title, $content, $author_id, $image_id)
    {
        $published_at = date('Y-m-d');
        $created_at = date('Y-m-d H:i:s');

        $query = "INSERT INTO `post` (`author_id`, `title`, `content`, `published_at`, `created_at`, `image_id`) 
              VALUES (:author_id, :title, :content, :published_at, :created_at, :image_id)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':author_id', $author_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':published_at', $published_at);
        $stmt->bindParam(':created_at', $created_at);
        $stmt->bindParam(':image_id', $image_id);
        $stmt->execute();

        return true;
    }

    //cikk szerkesztése
    public function updateArticle($article)
    {
        $sql = "UPDATE `post`
        SET `post`.`title` = :title, 
            `post`.`content` = :content
        WHERE `post`.`id` = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $article['id'],
            'title' => $article['title'],
            'content' => $article['content'],
        ]);
        return $this->getArticleById($article['id']);
    }

    //cikk törlése

    public function deleteArticle($id)
    {
        $query = "DELETE FROM `post` WHERE `id` = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

}


