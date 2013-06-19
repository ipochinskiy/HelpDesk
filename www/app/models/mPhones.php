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
        $phonesOld = $dom -> childNodes -> item(0);

        $phonesNew = $dom -> createElement("phones");
        $cdata = $dom -> createCDATASection($content);
        $phonesNew -> appendChild($cdata);

        $dom -> replaceChild($phonesNew, $phonesOld);

        file_put_contents(DATA_PATH . "phones.xml", $dom -> saveXML());
    }
}