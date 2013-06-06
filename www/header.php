<!DOCTYPE html>
<html>
<head>
    <title>HelpDesk</title>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link href=" <?php echo CSS_PATH . "style.css" ?>" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo JS_PATH . "/highslide/highslide.min.js" ?>"></script>
    <link rel="stylesheet" type="text/css" href=" <?php echo JS_PATH . "/highslide/highslide.css" ?>" />
    <script type="text/javascript">
        hs.graphicsDir = '<?php echo JS_PATH . "highslide/graphics/" ?>';
        hs.wrapperClassName = "wide-border";
    </script>


    <script src="<?php echo JS_PATH . "jquery-1.10.1.js" ?>"></script>
    <script src="<?php echo JS_PATH . "jquery-ui-1.10.3/ui/jquery-ui.js" ?>"></script>
    <script src="<?php echo JS_PATH . "dialog.js" ?>"></script>


</head>

<body>
<div class="wrapper">

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
    <div id="middle">
        <div id="leftside">

            <?php
            foreach($categories as $category) {
            ?>

            <div class='item'>
                <div class='item-body'>
                    <div class='item-header''>
                    <div class='header-tag-icon'>
                        <div class='l'></div>

                        <?php
                        echo "<div class='t'><a href='/" . $category["url"] . "'>" . $category["key"] . "</a></div>";
                        ?>

                    </div>
                </div>

                <?php
                if ($category["children"] != null) {
                    foreach ($category["children"] as $cat) {
                        ?>

                        <div class='item-content'>
                            <div class='l'></div>
                            <?php
                            echo "<div class='t'><a href='/" . $category["url"] . "/" . $cat["url"] . "'>" . $cat["key"] . "</a></div>";
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



