<?php

class mPhones extends model {

    function getPhones() {
        $this -> ensureFileExists("phones");

        $dom = new DOMDocument("1.0", "utf-8");
        $dom -> load(DATA_PATH . "phones.xml");

        return $dom -> childNodes -> item(0) -> textContent;
    }

    function editPhones($content) {
        $this -> ensureFileExists("phones");

        $dom = new DOMDocument("1.0", "utf-8");
        $dom -> load(DATA_PATH . "phones.xml");
        $phones = $dom -> childNodes -> item(0);

        $cdata = $dom -> createCDATASection($content);
        $phones -> appendChild($cdata);

        $dom -> appendChild($phones);

        file_put_contents(DATA_PATH . "phones.xml", $dom -> saveXML());
    }
}