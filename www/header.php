<!DOCTYPE html>
<html>
<head>
    <title>HelpDesk</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <link href=" <?php echo CSS_PATH . "style.css" ?>" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src=" <?php echo JS_PATH . "/highslide/highslide.min.js" ?>"></script>
    <link rel="stylesheet" type="text/css" href=" <?php echo JS_PATH . "/highslide/highslide.css" ?>" />
    <script type="text/javascript">
        hs.graphicsDir = <?php echo JS_PATH . "/highslide/graphics/" ?>;
        hs.wrapperClassName = "wide-border";
    </script>
</head>

<body>
<div class="wrapper">

    <!--
    Блок верхней части страницы
    -->

    <div id="header">
        <div id="logo">
            <a href="/"><img src="/img/logo.png" width="296" height="50"/></a>
        </div>
        <div id="header_sel">
            <select onchange="document.location=this.options[this.selectedIndex].value">
                <option value="#">Select CE device</option>
                <option value="/">modem1</option>
                <option value="/">modem2</option>
                <option value="/">router1</option>
            </select>
        </div>
    </div>

    <!--
    Конец Блок верхней части страницы
    -->

    <!--
    Блок содержимого страницы: левое меню и контент
    -->

    <div id="middle">

        <!--
        Левое меню
        -->

        <div id="leftside">

            <?php

            foreach($categories as $category) {
                echo "
                <div class='item'>
                    <div class='item-body'>
                        <div class='item-header''>
                            <div class='header-tag-icon'>
                                <div class='l'></div>
                                <div class='t'><a href='/" . $category["url"] . "'>" . $category["key"] . "</a></div>
                            </div>
                        </div>
                ";

                if ($category["children"] != null) {
                    foreach ($category["children"] as $cat) {
                        echo "
                        <div class='item-content'>
                            <div class='l'></div>
                            <div class='t'><a href='/" . $category["url"] . "/" . $cat["url"] . "'>" . $cat["key"] . "</a></div>
                        </div>
                    ";
                    }
                }

                echo "
                    </div>
                </div>
            ";

            }
            ?>

        </div>

        <!--
        Конец Левое меню
        -->

        <!--
        Рабочий холст на странице
        -->

        <div class="sheet">
            <div class="sheet-tl"></div>
            <div class="sheet-tr"></div>
            <div class="sheet-tc"></div>
            <div class="sheet-bc"></div>
            <div class="sheet-cl"></div>
            <div class="sheet-cr"></div>
            <div class="sheet-cc"></div>

            <!--
            Контент
            -->

            <div id="content">