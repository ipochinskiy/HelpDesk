<?php

class mNews extends model {

    function getList() {
        $this -> ensureFileExist(DATA_PATH . "news.xml", "<news></news>");

        $xml = new SimpleXMLElement(DATA_PATH . "news.xml", NULL, TRUE);
        if (count($xml) == 0) {
            return NULL;
//            throw new Exception("It seems there is news.xml file, but still no items there...");
        }

        $result[] = NULL;
        foreach ($xml as $item) {
            array_push($result, array(
                "date" => $item -> date,
                "author" => $item -> author,
                "text" => $item -> text,
            ));
        }

        return array_reverse(array_slice($result, 1));
    }

    function addItem($item) {
        $item["text"] = str_replace("+", " ", urldecode($item["text"]));
        $item["text"] = str_replace("%21", "", $item["text"]);
        $item["author"] = str_replace("+", " ", urldecode($item["author"]));
        $item["author"] = str_replace("%21", "", $item["author"]);

        $this -> ensureFileExist(DATA_PATH . "news.xml", "<news></news>");

        $xml = new SimpleXMLElement(DATA_PATH . "news.xml", NULL, TRUE);

        $new = $xml->addChild("new");
        $new->addChild("date", $item["date"]);
        $new->addChild("author", $item["author"]);
        $new->addChild("text", $item["text"]);

        $xml->saveXML(DATA_PATH . "news.xml");
    }
}