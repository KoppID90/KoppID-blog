<?php

namespace Controllers;

require_once REPOSITORY_PATH . '/PostRepository.php';

use Repositories\PostRepository;

class PublicPostController
{
    private $postRepository;

    public function __construct()
    {
        $this->postRepository = new PostRepository();
    }

    // A nyitólap a cikkek listázásához
    public function index()
    {
        $articles = $this->postRepository->getAllArticles();
        view('public/posts', ['articles' => $articles]);
    }


    // Egy cikk megjelenítése
    public function show($id)
    {
        $article = $this->postRepository->getArticleById($id);
        return view('public/post', ['article' => $article]);
    }

}