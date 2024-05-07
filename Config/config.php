<?php


define('BASE_URL', 'http://localhost/KoppID-blog');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_DATABASE', 'blog');
define('DB_CHARSET', 'utf8');

define('BASE_PATH', str_replace('\Config', '', __DIR__));
define('TEMPLATE_PATH', BASE_PATH . '/Templates');
define('REPOSITORY_PATH', BASE_PATH . '/Repositories');
define('CONTROLLER_PATH', BASE_PATH . '/Controllers');
define('HELPER_PATH', BASE_PATH . '/Helpers');
define('SERVICES_PATH', BASE_PATH . '/Services');
define('PUBLIC_PATH', TEMPLATE_PATH . '/public');

define('UPLOADS_URL', BASE_URL . '/uploads');

define('UPLOAD_DIR', str_replace('\Config', '\uploads', __DIR__));
