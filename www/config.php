<?php

define("PORTAL_ROOT_PATH", __DIR__ . "/");

define("CSS_PATH", "/css/");
define("JS_PATH", "/js/");
define("LIB_PATH", "/lib/");

define("PORTAL_ROUTING_PATH", PORTAL_ROOT_PATH . "app/routing.php");
define("CONTROLLERS_PATH", PORTAL_ROOT_PATH . "app/controllers/");
define("VIEWS_PATH", PORTAL_ROOT_PATH . "app/views/");
define("MODELS_PATH", PORTAL_ROOT_PATH . "app/models/");

define("DATA_PATH", PORTAL_ROOT_PATH . "data/");
define("IMG_PATH", DATA_PATH . "img/");

define("DEBUG_MODE", 0);

define("ERROR_NO_FILES", 0);
define("ERROR_NO_ITEMS", 1);
define("ERROR_UNKNOWN_SECTION", 2);
define("ERROR_NOT_FOUND", 3);
define("ERROR_UNSUPPORTED_ROUTE", 4);
define("ERROR_UNKNOWN_ERROR", 5);
define("ERROR_WRONG_CALL", 6);
