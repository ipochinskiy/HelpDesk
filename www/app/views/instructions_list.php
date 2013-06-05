<div id="news-add">
    <a href="/instructions/add"><img style="margin:-10px 5px 0 0;" src="/img/news-add.png" width="16" height="16" align="middle"/>Добавить инструкцию</a>
</div>

<?php

$instructions = array(
    array(
        "key" => "Модемы",
        "id" => "modems",
        "items" =>  array(),
    ),
    array(
        "key" => "Роутеры",
        "id" => "routers",
        "items" => array(),
    ),
    array(
        "key" => "STBs",
        "id" => "stbs",
        "items" => array(),
    ),
    array(
        "key" => "VoIPs",
        "id" => "voips",
        "items" => array(),
    ),
    array(
        "key" => "xDSL",
        "id" => "xdsl",
        "items" => array(),
    ),
    array(
        "key" => "FttB",
        "id" => "fttb",
        "items" => array(),
    ),
    array(
        "key" => "IPTV",
        "id" => "iptv",
        "items" => array(),
    ),
    array(
        "key" => "SIP",
        "id" => "sip",
        "items" => array(),
    ),
    array(
        "key" => "DSLAMs",
        "id" => "dslams",
        "items" => array(),
    ),
    array(
        "key" => "Ethernet-коммутаторы",
        "id" => "etth_switches",
        "items" => array(),
    ),
    array(
        "key" => "Оборудование уровня агрегации и ядра",
        "id" => "core_aggr_devices",
        "items" => array(),
    ),
);

foreach ($data as $d) {
    for ($i = 0; $i < count($instructions); $i++) {
        if ($instructions[$i]["id"] == $d["section"]) {
            $instructions[$i]["items"][] = $d;
        }
    }
}

foreach ($instructions as $section) {
    if (count($section["items"]) != 0) {
        echo "<h1>" . $section["key"] . "</h1>";
        echo "<ul>";
        foreach ($section["items"] as $i) {
            echo "<li><a href='/instructions?section=" . $section["id"] . "&item=" . $i["id"] . "'>". $i["key"] . "</a></li>";
        }
        echo "</ul>";
    }
}

?>