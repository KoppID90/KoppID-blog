<?php

require_once 'Config/bootstrap.php';
require_once CONTROLLER_PATH . '/PrivatePostController.php';

use Controllers\PrivatePostController;

$controller = new PrivatePostController();
$controller->store($_POST);


