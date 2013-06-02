<?php

defined("PORTAL_ROOT_PATH") || define("PORTAL_ROOT_PATH", __DIR__ . "/");

defined("CSS_PATH") || define("CSS_PATH", "/css/");
defined("JS_PATH") || define("JS_PATH", "/js/");
defined("LIB_PATH") || define("LIB_PATH", "/lib/");

defined("PORTAL_ROUTING_PATH") || define("PORTAL_ROUTING_PATH", PORTAL_ROOT_PATH . "app/routing.php");
defined("CONTROLLERS_PATH") || define("CONTROLLERS_PATH", PORTAL_ROOT_PATH . "app/controllers/");
defined("VIEWS_PATH") || define("VIEWS_PATH", PORTAL_ROOT_PATH . "app/views/");
defined("MODELS_PATH") || define("MODELS_PATH", PORTAL_ROOT_PATH . "app/models/");

defined("FILES_PATH") || define("FILES_PATH", PORTAL_ROOT_PATH . "/files/");
defined("DOC_PATH") || define("DOC_PATH", FILES_PATH . "doc/");
defined("HTML_PATH") || define("HTML_PATH", FILES_PATH . "html/");
defined("ETC_PATH") || define("ETC_PATH", FILES_PATH . "etc/");
defined("IMG_PATH") || define("IMG_PATH", FILES_PATH . "img/");
defined("NEWS_PATH") || define("NEWS_PATH", FILES_PATH . "_news/");

defined("DEBUG_MODE") || define("DEBUG_MODE", 1);
//defined("USED_CSS") || define("USED_CSS", array());
//defined("USED_JS") || define("USED_JS", array());

$categories = array(
    array(
        "url" => "news",
        "key" => "Новости",
        "children" => null,
    ),
    array(
        "url" => "instructions",
        "key" => "Инструкции",
        "children" => array(
            array(
                "url" => "ce",
                "key" => "Client Edge",
                "children" => array(
                    array(
                        "url" => "modems",
                        "key" => "Модемы",
                        "file" => FILES_PATH . "modems.csv",
                    ),
                    array(
                        "url" => "routers",
                        "key" => "Роутеры",
                        "file" => FILES_PATH . "routers.csv",
                    ),
                    array(
                        "url" => "stbs",
                        "key" => "Приставки STB",
                        "file" => FILES_PATH . "stbs.csv",
                    ),
                    array(
                        "url" => "voips",
                        "key" => "Шлюзы VOIP",
                        "file" => FILES_PATH . "voips.csv",
                    ),
                ),
            ),
            array(
                "url" => "pe",
                "key" => "Provider Edge",
            ),
            array(
                "url" => "incidents",
                "key" => "Инциденты",
                "children" => array(
                    array(
                        "url" => "dsl",
                        "key" => "xDSL",
                    ),
                    array(
                        "url" => "fttb",
                        "key" => "FttB",
                    ),
                    array(
                        "url" => "iptv",
                        "key" => "IPTV",
                    ),
                    array(
                        "url" => "sip",
                        "key" => "SIP",
                    ),
                    array(
                        "url" => "vpn",
                        "key" => "VPN",
                    ),
                ),
            ),
            array(
                "url" => "soft",
                "key" => "ПО и ПК",
            ),
        ),
    ),
    array(
        "url" => "vips",
        "key" => "VIP клиенты",
        "children" => null,
    ),
    array(
        "url" => "phones",
        "key" => "Телефонный справочник",
        "children" => null,
    ),
    array(
        "url" => "tools",
        "key" => "Инструменты",
        "children" => null,
    ),
);