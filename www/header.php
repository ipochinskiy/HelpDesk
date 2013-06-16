<!DOCTYPE html>
<html>
<head>
    <title>HelpDesk</title>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link href=" <?php echo CSS_PATH . "style.css" ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href ="<?php echo JS_PATH . "jquery-ui-1.10.3.custom/css/redmond/jquery-ui-1.10.3.custom.css" ?>" />
    <link rel="stylesheet" type="text/css" href=" <?php echo JS_PATH . "highslide/highslide.css" ?>" />

    <script type="text/javascript" src="<?php echo JS_PATH . "highslide/highslide.min.js" ?>"></script>
    <script type="text/javascript">
        hs.graphicsDir = '<?php echo JS_PATH . "highslide/graphics/" ?>';
        hs.wrapperClassName = "wide-border";
    </script>
    <script src="<?php echo JS_PATH . "jquery-1.10.1.js" ?>"></script>
    <script src="<?php echo JS_PATH . "jquery-ui-1.10.3/ui/jquery-ui.js" ?>"></script>
    <script src="<?php echo JS_PATH . "dialog.js" ?>"></script>


</head>

<body>

<div id="dialog-form" title="Добавить новость">
    <form action="/news/add" method="POST">
        <input type="text" required maxlength="30" name="author" id="author" class="text ui-widget-content ui-corner-all" placeholder="Автор" />
        <input type="text" required maxlength="250" name="text" id="text" class="text ui-widget-content ui-corner-all" placeholder="Текст новости" />
        <input style="display: none" class="submit" type="submit" value="send" />
    </form>
</div>

<div class="wrapper">

    <div id="header">
        <div id="logo">
            <a href="/">HelpDesk</a>
        </div>

        <div id="add-buttons">
            <div id="add-news">
                <a href="/news/add"><img src="/img/clipboard_add.png" width="32" height="32" align="middle"/>Добавить новость</a>
            </div>

            <div id="add-instruction">
                <a href="/instructions/add"><img src="/img/document_add.png" width="32" height="32" align="middle"/>Добавить инструкцию</a>
            </div>

            <div id="add-vip">
                <a href="/vips/add"><img src="/img/vip_add.png" width="32" height="32" align="middle"/>Добавить VIP</a>
            </div>

            <div id="edit-phones">
                <a href="/phones/edit"><img src="/img/document_pencil.png" width="32" height="32" align="middle"/>Редактировать телефоны</a>
            </div>
        </div>
    </div>

    <div id="middle">
        <div id="leftside">

            <?php
            $xml = new SimpleXMLElement(DATA_PATH . "menu.xml", NULL, TRUE);
            foreach($xml -> category as $category) {
                ?>

                <div class='item'>
                    <div class='item-body'>
                        <div class='item-header'>
                            <div class='header-tag-icon'>
                                <div class='l'></div>

                                <?php
                                echo "<div class='t'><a href='/" . $category -> url . "'>" . $category -> key . "</a></div>";
                                ?>

                            </div>
                        </div>

                        <?php
                        if (count($category -> children) != 0) {
                            foreach ($category -> children -> category as $cat) {
                                ?>

                                <div class='item-content'>
                                    <div class='l'></div>
                                    <?php
                                    echo "<div class='t'><a href='/" . $category -> url . "/" . $cat -> url . "'>" . $cat -> key . "</a></div>";
                                    ?>
                                </div>
                            <?php
                            }
                        }
                        ?>

                    </div>
                </div>

            <?php
            }
            ?>

        </div>

        <div id="content">


