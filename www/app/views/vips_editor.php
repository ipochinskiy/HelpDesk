<form action="/vips/add" method="post">
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
            theme_advanced_buttons2 : "tablecontrols,|,bold,italic,underline,strikethrough,|,sub,sup,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,|,forecolor,backcolor,|,link,unlink,anchor,|,images,media,|,charmap,nonbreaking,|,styleprops,attribs,|,removeformat,cleanup",
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
    if ($data) {
        echo "<p style='color:red;font-weight:bold'>Необходимо заполнить все поля</p>";
    }
    ?>

    <input name="post" type="hidden" value="ok">

    <table style="width:963px;">
        <tr><td>Alias<b>*</b> vip'а:</td><td><input name="alias" type="text" size="60" value=<?php echo $_POST["alias"] ?> ></td></tr>
        <tr><td colspan="2"><b>* - alias</b>: заполняется латинскими буквамии <b>без</b> слеша в конце "/"<br></td></tr>
        <tr><td>Наименование VIP'а:</td><td><input name="name" type="text" size="60" value=<?php echo $_POST["name"] ?> ></td></tr>
    </table>

    <textarea id='h' name="content" class="editor_big" style="height:500px;"><?php echo $_POST["content"] ?></textarea>
    <br />
    <input type="submit" value="Добавить" />
</form>
