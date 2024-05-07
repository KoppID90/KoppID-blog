<?php

namespace Controllers;

require_once REPOSITORY_PATH . '/PostRepository.php';
require_once SERVICES_PATH . '/FileUploadService.php';
require_once REPOSITORY_PATH . '/AuthorRepository.php';

use Repositories\AuthorRepository;
use Repositories\PostRepository;
use Services\FileUploadService;

class PrivatePostController
{
    private $postRepository;
    private $authorRepository;
    private $fileUploadService;

    public function __construct()
    {
        $this->postRepository = new PostRepository();
        $this->authorRepository = new AuthorRepository();
        $this->fileUploadService = new FileUploadService();
    }


    // A nyitólap a cikkek listázásához
    public function index()
    {
        $articles = $this->postRepository->getAllArticlesDescByCreatedAt();
        view('private/private-articles', ['articles' => $articles]);
    }

    // Cikk hozzáadása oldal megjelenítése
    public function create()
    {

        $authors = $this->authorRepository->getAllAuthors();
        view('private/private-create-article', ['authors' => $authors]);
    }

    // Cikk mentése az adatbázisba (feldoglozó)
    public function store($post)
    {
        if (!isset($post['title'], $post['content'], $_FILES['image'], $post['author'])) {
            setFlashMessage('error', 'Szükséges elemek nem léteznek!');
            redirect(BASE_URL . '/private-create-article.php');
        }

        $title = $post['title'];
        $content = $post['content'];
        $author_id = $post['author'];

        if (empty($title) or empty($content)) {
            setFlashMessage('error', 'Mezők kitöltése kötelező!');
            redirect(BASE_URL . '/private-create-article.php');
        }

        // Fájl validáció és feltöltés
        $image_id = $this->fileUploadService->execute($_FILES['image']);

        if (!$image_id) {
            setFlashMessage('error', 'Hiba a fájlfeltöltés során!');
            redirect(BASE_URL . '/private-create-article.php');
        }

        $this->postRepository->createArticle(
            $title,
            $content,
            $author_id,
            $image_id
        );
        setFlashMessage('success', 'A cikk sikeresen mentve lett!');
        redirect(BASE_URL . '/private-articles.php');

    }
    // Cikk módosítása oldal megjelenítése
    public function edit()
    {
        if (isset($_SESSION['form'])) {
            $form = $_SESSION['form'];
            unset($_SESSION['form']);
        } else {

            if (!isset($_GET['id'])) {
                setFlashMessage('danger', 'Hiányzó azonosító!');
                redirect(BASE_URL . '/private-articles.php');
            }

            $id = $_GET['id'];

            $article = $this->postRepository->getArticleById($id);

            if (!$article) {
                setFlashMessage('danger', 'Nincs ilyen azonosítójú cikk!');
                redirect(BASE_URL . '/private-articles.php');
            }

            $form = [
                'id' => $article['id'],
                'title' => $article['title'],
                'content' => $article['content'],
            ];

        }

        view('private/private-edit-article', ['form' => $form]);

    }

    // Cikk módosítása mentése az adatbázisba (feldoglozó)
    public function update($post)
    {
        $article = $this->postRepository->updateArticle($post);

        if (!$article) {
            $_SESSION['form'] = $post;
            setFlashMessage('danger', 'A cikk módosítása sikertelen!');
            redirect(BASE_URL . '/private-edit-article.php?id=' . $post['id']);
        }

        setFlashMessage('success', 'A cikk sikeresen módosítva!');
        redirect(BASE_URL . '/private-articles.php');
    }

    // Cikk törlése
    public function destroy()
    {
        if (!isset($_GET['id'])) {
            setFlashMessage('danger', 'Hiányzó azonosító!');
            redirect(BASE_URL . '/private-articles.php');
        }

        $id = $_GET['id'];

        $post = $this->postRepository->getArticleById($id);

        if (!$post) {
            setFlashMessage('danger', 'Nincs ilyen azonosítójú cikk!');
            redirect(BASE_URL . '/private-articles.php');
        }

        $this->postRepository->deleteArticle($id);

        setFlashMessage('success', 'A cikk sikeresen törölve!');
        redirect(BASE_URL . '/private-articles.php');
    }
}