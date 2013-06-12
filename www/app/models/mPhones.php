<?php

class mPhones extends model {

    function getPhones() {
        $this -> ensureFileExists(DATA_PATH . "phones", "html", "");
        return file_get_contents(DATA_PATH . "phones.html");
    }

    function editPhones($content) {
        $this -> ensureFileExists(DATA_PATH . "phones", "html", "");
        file_put_contents(DATA_PATH . "phones.html", $content);
    }
}