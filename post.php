<?php

require_once 'Config/bootstrap.php';
require_once CONTROLLER_PATH . '/PublicPostController.php';

use Controllers\PublicPostController;

$controller = new PublicPostController();

$id = $_GET['id'];

$controller->show($id);


