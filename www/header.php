<!DOCTYPE html>
<html>
<head>
    <title>HelpDesk</title>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link href=" <?php echo CSS_PATH . "style.css" ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href ="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
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

<div id="dialog-form" title="Create new user">
    <p class="validateTips">All form fields are required.</p>
    <form action="/" method="post">
        <fieldset>
            <label for="author">Author</label>
            <input type="text" name="author" id="author" class="text ui-widget-content ui-corner-all" />
            <label for="text">Text</label>
            <input type="text" name="text" id="text" value="" class="text ui-widget-content ui-corner-all" />
        </fieldset>
    </form>
</div>

<div class="wrapper">

    <div id="header">
        <div id="logo">
            <a href="/"><img src="/img/logo.png" width="296" height="50"/></a>
        </div>

        <div id="news-add" style="float:left;">
            <a href=""><img style="margin:-10px 5px 0 0;" src="img/news-add.png" width="16" height="16" align="middle"/>Добавить новость</a>
        </div>

        <div id="instruction-add" style="float:left;">
            <a href="/instructions/add"><img style="margin:-10px 5px 0 0;" src="/img/news-add.png" width="16" height="16" align="middle"/>Добавить инструкцию</a>
        </div>

        <div id="vip-add" style="float:left;">
            <a href="vips/add"><img style="margin:-10px 5px 0 0;" src="img/news-add.png" width="16" height="16" align="middle"/>Добавить VIP</a>
        </div>

        <div id="header_sel">
            <select onchange="document.location=this.options[this.selectedIndex].value" >
                <option value="#">Select CE device</option>
                <option value="/">modem1</option>
                <option value="/">modem2</option>
                <option value="/">router1</option>
            </select>
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

        <div class="table-sheet">
            <table>
                <tbody>
                <tr>
                    <td class="table-tl"></td>
                    <td class="table-tc"></td>
                    <td class="table-tr"></td>
                </tr>
                <tr>
                    <td class="table-cl"></td>
                    <td class="table-cc">
                        <div id="content">

