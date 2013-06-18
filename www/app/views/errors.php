<?php

switch ($data -> getCode()) {
    case ERROR_NO_FILES: {
        $text = "Can't create some service files";
        break;
    }
    case ERROR_NO_ITEMS: {
        $text = "There's no items in there, let it be tabula rasa!";
        break;
    }
    case ERROR_UNKNOWN_SECTION: {
        $text = "Section you requested can be found only somewhere in another universe...";
        break;
    }
    case ERROR_NOT_FOUND: {
        $text = "Something you requested isn't found on HelpDesk";
        break;
    }
    case ERROR_UNSUPPORTED_ROUTE: {
        $text = "URL you requested leads to nowhere. Choose another way to reach your goal.";
        break;
    }
    case ERROR_WRONG_CALL: {
        $text = "Wrong procedure call.";
        break;
    }
    default: {
    $text = "Oops! Something went wrong. Check it out later or call an administrator.";
    }
}

?>

    <div id="error">
        <img src="/img/kitty_tears.png" align="middle" />
        <h2><?php echo $text; ?></h2>
        <div>
            <?php
                if (DEBUG_MODE) {
                    echo str_replace("\n", "<br />", $data -> getTraceAsString());
                }
            ?>
        </div>
        <div>
            <?php
            if (DEBUG_MODE) {
                echo "<br />Text of exception: " . str_replace("\n", "<br />", $data -> getMessage());
                echo "<br />Location of exception: " . str_replace("\n", "<br />", $data -> getFile()) . ":" . str_replace("\n", "<br />", $data -> getLine());
            }
            ?>
        </div>
    </div>

<?php

include PORTAL_ROOT_PATH . "footer.html";
die();

?>