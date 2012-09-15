<?php

defined("PORTAL_ROOT_PATH") || define("PORTAL_ROOT_PATH", __DIR__ . "/");

defined("CSS_PATH") || define("CSS_PATH", PORTAL_ROOT_PATH . "css/");
defined("JS_PATH") || define("JS_PATH", PORTAL_ROOT_PATH . "js/");
defined("LIB_PATH") || define("LIB_PATH", PORTAL_ROOT_PATH . "lib/");

defined("PORTAL_ROUTING_PATH") || define("PORTAL_ROUTING_PATH", PORTAL_ROOT_PATH . "app/routing.php");
defined("CONTROLLERS_PATH") || define("CONTROLLERS_PATH", PORTAL_ROOT_PATH . "app/controllers/");
defined("VIEWS_PATH") || define("VIEWS_PATH", PORTAL_ROOT_PATH . "app/views/");
defined("MODELS_PATH") || define("MODELS_PATH", PORTAL_ROOT_PATH . "app/models/");
defined("FILES_PATH") || define("FILES_PATH", PORTAL_ROOT_PATH . "files/");

defined("DOC_PATH") || define("DOC_PATH", FILES_PATH . "doc/");
defined("HTML_PATH") || define("HTML_PATH", FILES_PATH . "html/");
defined("ETC_PATH") || define("ETC_PATH", FILES_PATH . "etc/");
defined("IMG_PATH") || define("IMG_PATH", FILES_PATH . "img/");

defined("DEBUG_MODE") || define("DEBUG_MODE", 1);
//defined("USED_CSS") || define("USED_CSS", array());
//defined("USED_JS") || define("USED_JS", array());

?>