<?php

if (!function_exists('dd')) {
    function dd($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit;
    }
}

if (!function_exists('encrypt')) {
    function encrypt($string)
    {
        return hash('sha512', $string);
    }
}


if (!function_exists('view')) {
    function view($view, $data = [])
    {
        extract($data);
        include_once BASE_PATH . '/Templates/common/header.view.php';
        include_once BASE_PATH . '/Templates/common/navbar.view.php';
        include_once BASE_PATH . '/Templates/' . $view . '.view.php';
        include_once BASE_PATH . '/Templates/common/footer.view.php';
    }
}
if (!function_exists('setFlashMessage')) {
    function setFlashMessage($type, $message): void
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type
        ];
    }
}

if (!function_exists('getFlashMessage')) {
    function getFlashMessage(): array
    {
        if (isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];

            unset($_SESSION['flash']);

            return $flash;
        }

        return [];
    }
}


if (!function_exists('redirect')) {
    function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
}