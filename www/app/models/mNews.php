<?php

class mNews extends model {

    function getList() {
        $this -> ensureFileExists("news");

        $dom = new DOMDocument("1.0", "utf-8");
        $dom -> load(DATA_PATH . "news.xml");

        $result[] = NULL;
        $news = $dom -> childNodes -> item(0) -> childNodes;
        for ($i = 0; $i < $news -> length; $i++) {
            $new = $news -> item($i);
            array_push($result, array(
                "date" => $new -> childNodes -> item(0) -> nodeValue,
                "author" => $new -> childNodes -> item(1) -> textContent,
                "text" => $new -> childNodes -> item(2) -> textContent,
            ));
        }

        return array_reverse(array_slice($result, 1));
    }

    function addItem($item) {
        $this -> ensureFileExists("news");

        $dom = new DOMDocument("1.0", "utf-8");
        $dom -> load(DATA_PATH . "news.xml");
        $news = $dom -> childNodes -> item(0);

        $new = $dom -> createElement("new");
        $new -> appendChild($dom -> createElement("date", $item["date"]));
        $author = $new -> appendChild($dom -> createElement("author"));
        $text = $new -> appendChild($dom -> createElement("text"));

        $cdata = $dom -> createCDATASection($item["author"]);
        $author -> appendChild($cdata);
        $cdata = $dom -> createCDATASection($item["text"]);
        $text -> appendChild($cdata);

        $news -> appendChild($new);
        $dom -> appendChild($news);

        file_put_contents(DATA_PATH . "news.xml", $dom -> saveXML());
    }
}