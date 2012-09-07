<?php

require_once 'config.php';

ini_set('display_errors', DEBUG_MODE);

require_once PORTAL_ROOT_PATH . "/app/model.php";
require_once PORTAL_ROOT_PATH . "/app/view.php";
require_once PORTAL_ROOT_PATH . "/app/controller.php";
require_once PORTAL_ROUTING_PATH;

Route::start();

?>