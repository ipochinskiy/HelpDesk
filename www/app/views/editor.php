<form action="<?php echo $formActionLink ?>" method="POST">
    <script type="text/javascript" src="<?php echo JS_PATH . "tiny_mce/tiny_mce.js" ?>"></script>
    <script type="text/javascript">
        tinyMCE.init({
            // General options
            mode : "textareas",
            theme : "advanced",
            editor_selector : /(editor|editor_big|editor_small)/,
            plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,spellchecker,images,media,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
            // Theme options
            theme_advanced_buttons1 : "code,fullscreen,|,newdocument,|,paste,pastetext,pasteword,|,undo,redo,|,search,replace,|,outdent,indent,|,spellchecker,|,visualaid,|,insertdate,inserttime,|,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "tablecontrols,|,bold,italic,underline,strikethrough,|,sub,sup,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,|,forecolor,backcolor,|,link,unlink,anchor,|,images,media",
            theme_advanced_buttons3 : "",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,
            // Example content CSS (should be your site CSS)
            content_css : "skin/text.css",
            //Path
            relative_urls : false,
            remove_script_host : true,
            extended_valid_elements : "tcut",
            language : "ru"
        });
    </script>

    <?php
    if ($allFieldsRequired) {
        echo "<p style='color:red;font-weight:bold'>Необходимо заполнить все поля</p>";
    }
    ?>

    <input name="post" type="hidden" value="ok">

    <?php
    if ($formActionLink != "/phones/edit") {
        ?>

        <table>

            <?php
            if ($formActionLink == "/instructions/add"
                || $formActionLink == "/instructions/edit") {
                ?>

                <tr>
                    <td>Секция:</td>
                    <td>
                        <select name="section" size="1" style="width: 300px;">
                            <option <?php if ($_GET["section"] == "modem") {echo "selected";} ?> value="0">Модемы</option>
                            <option <?php if ($_GET["section"] == "router") {echo "selected";} ?> value="1">Роутеры</option>
                            <option <?php if ($_GET["section"] == "stb") {echo "selected";} ?> value="2">Приставки STB</option>
                            <option <?php if ($_GET["section"] == "voip") {echo "selected";} ?> value="3">Шлюзы VoIP</option>
                            <option <?php if ($_GET["section"] == "dslam") {echo "selected";} ?> value="4">DSLAM'ы</option>
                            <option <?php if ($_GET["section"] == "etth") {echo "selected";} ?> value="5">Коммутаторы Ethernet</option>
                            <option <?php if ($_GET["section"] == "core") {echo "selected";} ?> value="6">Оборудование агрегации и ядра сети</option>
                            <option <?php if ($_GET["section"] == "xdsl") {echo "selected";} ?> value="7">Инциденты xDSL</option>
                            <option <?php if ($_GET["section"] == "fttb") {echo "selected";} ?> value="8">Инциденты FttB</option>
                            <option <?php if ($_GET["section"] == "iptv") {echo "selected";} ?> value="9">Инциденты IPTV</option>
                            <option <?php if ($_GET["section"] == "sip") {echo "selected";} ?> value="10">Инциденты SIP</option>
                            <option <?php if ($_GET["section"] == "browser") {echo "selected";} ?> value="11">Настройки браузеров</option>
                            <option <?php if ($_GET["section"] == "connection") {echo "selected";} ?> value="12">Настройки подключений</option>
                            <option <?php if ($_GET["section"] == "mail-client") {echo "selected";} ?> value="13">Настройки почтовых клиентов</option>
                        </select>
                    </td>
                    <td></td>
                </tr>

            <?php
            }
            ?>

            <tr>
                <td>Alias:</td>
                <td><input type="text" style="width: 296px;" required maxlength="50" name="alias" size="30" placeholder="huawei_mt_880_2.0.1" value=<?php echo $alias ?>></td>
                <td>(заполняется латинскими буквамии <b>без</b> слеша в конце "/")<br></td>
            </tr>
            <tr>
                <td>Наименование:</td>
                <td><input type="text" style="width: 296px;" required maxlength="50" name="name" size="30" placeholder="Huawei MT880 (fw: 2.0.1)" value=<?php echo $name ?>></td>
            </tr>
        </table>

    <?php
    }
    ?>

    <textarea id='h' name="content" class="editor_big" style="height:500px;width:830"><?php echo $content ?></textarea>

    <?php

    switch($formActionLink) {
        case "/instructions/edit" : {
            ?>
            <input type="hidden" name="oldSection" value="<?php echo $_GET["section"] ?>" />
        <?php
        }
        case "/vips/edit" : {
            ?>
            <input type="hidden" name="oldAlias" value="<?php echo $alias ?>" />
        <?php
        }
            default:{}
    }
    ?>

    <input type="submit" value="Добавить" />
</form>
