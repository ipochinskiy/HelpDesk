<?php

define("PORTAL_ROOT_PATH", __DIR__ . "/");

define("CSS_PATH", "/css/");
define("JS_PATH", "/js/");
define("LIB_PATH", "/lib/");

define("PORTAL_ROUTING_PATH", PORTAL_ROOT_PATH . "app/routing.php");
define("CONTROLLERS_PATH", PORTAL_ROOT_PATH . "app/controllers/");
define("VIEWS_PATH", PORTAL_ROOT_PATH . "app/views/");
define("MODELS_PATH", PORTAL_ROOT_PATH . "app/models/");

define("DATA_PATH", PORTAL_ROOT_PATH . "/data/");
define("DOC_PATH", DATA_PATH . "doc/");
define("ETC_PATH", DATA_PATH . "etc/");
define("IMG_PATH", DATA_PATH . "img/");
define("NEWS_PATH", DATA_PATH . "_news/");

define("DEBUG_MODE", 1);
//define("USED_CSS", array());
//define("USED_JS", array());

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
                        "file" => DATA_PATH . "modems.xml",
                    ),
                    array(
                        "url" => "routers",
                        "key" => "Роутеры",
                        "file" => DATA_PATH . "routers.xml",
                    ),
                    array(
                        "url" => "stbs",
                        "key" => "Приставки STB",
                        "file" => DATA_PATH . "stbs.xml",
                    ),
                    array(
                        "url" => "voips",
                        "key" => "Шлюзы VOIP",
                        "file" => DATA_PATH . "voips.xml",
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