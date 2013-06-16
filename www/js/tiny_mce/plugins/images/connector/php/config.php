<?php

//Корневая директория сайта
define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT']);
//Директория с изображениями (относительно корневой)
define('DIR_IMAGES', '/data/img');
//Директория с файлами (относительно корневой)
define('DIR_FILES',	'/data/files');


//Высота и ширина картинки до которой будет сжато исходное изображение и создана ссылка на полную версию
define('WIDTH_TO_LINK', 240);
define('HEIGHT_TO_LINK', 240);
//
define('CLASS_LINK', 'highslide');
define('REL_LINK', 'return hs.expand(this)');

date_default_timezone_set('Asia/Yekaterinburg');

?>
