<?php

namespace Controllers;

require_once REPOSITORY_PATH . '/AuthorRepository.php';

use Repositories\AuthorRepository;

class PrivateAuthorController
{
    protected $authorRepository;
    public function __construct()
    {
        $this->authorRepository = new AuthorRepository();
    }
    // A szerzők listázásához
    public function index()
    {
        $authors = $this->authorRepository->getAllAuthors();
        view('private/private-authors', ['authors' => $authors]);
    }

    // Szerző hozzáadása oldal megjelenítése
    public function create()
    {
        $authors = $this->authorRepository->getAllAuthors();
        view('private/private-create-author', ['authors' => $authors]);
    }

    //  Szerző mentése az adatbázisba (feldolgozó)
    public function store($post)
    {
        if (!isset($post['name'], $post['status'], $post['email'], $post['password'])) {
            setFlashMessage('error', 'Szükséges elemek nem léteznek!');
            redirect(BASE_URL . '/private-create-author.php');
        }

        $name = $post['name'];
        $status = $post['status'];
        $email = $post['email'];
        $password = $post['password'];
        $confirmPassword = $post['confirm_password'];

        if (empty($name) or empty($status) or empty($email) or empty($password)) {
            setFlashMessage('error', 'Mezők kitöltése kötelező!');
            redirect(BASE_URL . '/private-create-author.php');
        }

        if (strlen($name) < 5) {
            setFlashMessage('error', 'A névnek legalább 5 karakter hosszúnak kell lennie!');
            redirect(BASE_URL . '/private-create-author.php');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            setFlashMessage('error', 'Az email cím formátuma nem megfelelő!');
            redirect(BASE_URL . '/private-create-author.php');
        }

        if (strlen($password) < 6) {
            setFlashMessage('error', 'A jelszónak legalább 6 karakter hosszúnak kell lennie!');
            redirect(BASE_URL . '/private-create-author.php');
        }

        if ($password !== $confirmPassword) {
            setFlashMessage('error', 'Nem egyeznek a jelszavak!');
            redirect(BASE_URL . '/private-create-author.php');
        }

        $hashedPassword = encrypt($password);

        $this->authorRepository->createAuthor($name, $status, $email, $hashedPassword);

        setFlashMessage('success', 'A szerző sikeresen mentve lett!');
        redirect(BASE_URL . '/private-authors.php');
    }

    // Szerző szerkesztése/statusChange oldal megjelenítése
    public function edit()
    {
        if (isset($_SESSION['form'])) {
            $form = $_SESSION['form'];
            unset($_SESSION['form']);
        } else {

            if (!isset($_GET['id'])) {
                setFlashMessage('error', 'Hiányzó azonosító!');
                redirect(BASE_URL . '/private-authors.php');
            }

            $id = $_GET['id'];

            $author = $this->authorRepository->getAuthorById($id);

            if (!$author) {
                setFlashMessage('error', 'Nincs ilyen azonosítójú szerző!');
                redirect(BASE_URL . '/private-authors.php');
            }

            $form = [
                'id' => $author['id'],
                'name' => $author['name'],
                'email' => $author['email'],
                'status' => $author['status']
            ];
        }
        view('private/private-edit-author', ['form' => $form]);
    }

    //  Szerző letiltása
    public function statusChange($post)
    {
        $author = $this->authorRepository->updateAuthor($post);

        if (!$author) {
            $_SESSION['form'] = $post;
            setFlashMessage('error', 'A szerző módosítása sikertelen!');
            redirect(BASE_URL . '/private-edit-author.php?id=' . $post['id']);
        }

        setFlashMessage('success', 'A szerző sikeresen módosítva!');
        redirect(BASE_URL . '/private-authors.php');
    }

    //  Szerző törlése
    public function destroy()
    {
        if (!isset($_GET['id'])) {
            setFlashMessage('error', 'Hiányzó azonosító!');
            redirect(BASE_URL . '/private-authors.php');
        }

        $id = $_GET['id'];

        $post = $this->authorRepository->getAuthorById($id);

        if (!$post) {
            setFlashMessage('error', 'Nincs ilyen azonosítójú szerző!');
            redirect(BASE_URL . '/private-articles.php');
        }

        $this->authorRepository->deleteAuthor($id);

        setFlashMessage('success', 'A szerző sikeresen törölve!');
        redirect(BASE_URL . '/private-authors.php');
    }
}