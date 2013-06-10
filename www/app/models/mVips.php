<?php

class mVips extends model {

    function getList() {
        $this -> ensureFileExist(DATA_PATH . "vips.xml", "<vips></vips>");

        $xml = new SimpleXMLElement(DATA_PATH . "vips.xml", NULL, TRUE);
        if (count($xml) == 0) {
            return NULL;
//            throw new Exception("It seems there is vips.xml file, but still no items there...");
        }

        $result[] = NULL;
        foreach ($xml as $item) {
            array_push($result, array(
                "id" => $item -> id,
                "name" => $item -> name,
                "content" => $item -> content,
            ));
        }

        return array_slice($result, 1);
    }

    function getItem($id) {
        $xml = new SimpleXMLElement(DATA_PATH . "vips.xml", NULL, TRUE);
        foreach ($xml -> vip as $vip) {
            if ($vip -> id == $id) {
                return array (
                    "name" => $vip -> name,
                    "content" => $vip -> content,
                );
            }
        }
    }

    function addItem($id, $name, $content) {
        $this -> ensureFileExist(DATA_PATH . "vips.xml", "<vips></vips>");

        $xml = new SimpleXMLElement(DATA_PATH . "vips.xml", NULL, TRUE);

        $item = $xml -> addChild("vip");
        $item -> addChild("id", $id);
        $item -> addChild("name", $name);
        $item -> addChild("content", $content);

        $xml->saveXML(DATA_PATH . "vips.xml");
    }

}