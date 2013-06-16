<?php

class mVips extends model {

    function getList() {
        $this -> ensureFileExists("vips");

        $dom = new DOMDocument("1.0", "utf-8");
        $dom -> load(DATA_PATH . "vips.xml");

        $result[] = NULL;
        $vips = $dom -> childNodes -> item(0) -> childNodes;
        for ($i = 0; $i < $vips -> length; $i++) {
            $vip = $vips -> item($i);
            array_push($result, array(
                "id" => $vip -> childNodes -> item(0) -> nodeValue,
                "name" => $vip -> childNodes -> item(1) -> textContent,
                "content" => $vip -> childNodes -> item(2) -> textContent,
            ));
        }

        return array_reverse(array_slice($result, 1));
    }

    function getItem($id) {
        $this -> ensureFileExists("vips");

        $dom = new DOMDocument("1.0", "utf-8");
        $dom -> load(DATA_PATH . "vips.xml");

        $vips = $dom -> childNodes -> item(0) -> childNodes;

        for ($i = 0; $i < $vips -> length; $i++) {
            if ($vips -> item($i) -> childNodes -> item(0) -> nodeValue == $id) {
                return array (
                    "name" => $vips -> item($i) -> childNodes -> item(1) -> nodeValue,
                    "content" => $vips -> item($i) -> childNodes -> item(2) -> textContent,
                );
            }
        }
        return NULL;
    }

    function addItem($item) {
        $this -> ensureFileExists("vips");

        $dom = new DOMDocument("1.0", "utf-8");
        $dom -> load(DATA_PATH . "vips.xml");
        $vips = $dom -> childNodes -> item(0);

        $vip = $dom -> createElement("vip");
        $vip -> appendChild($dom -> createElement("id", $item["id"]));
        $name = $vip -> appendChild($dom -> createElement("name"));
        $content = $vip -> appendChild($dom -> createElement("content"));

        $cdata = $dom -> createCDATASection($item["name"]);
        $name -> appendChild($cdata);
        $cdata = $dom -> createCDATASection($item["content"]);
        $content -> appendChild($cdata);

        $vips -> appendChild($vip);
        $dom -> appendChild($vips);

        file_put_contents(DATA_PATH . "vips.xml", $dom -> saveXML());
    }

}