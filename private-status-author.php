<?php

require_once 'Config/bootstrap.php';
require_once CONTROLLER_PATH . '/PrivateAuthorController.php';

use Controllers\PrivateAuthorController;

$controller = new PrivateAuthorController();
$controller->statusChange($_POST);