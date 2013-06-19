<?php

class mInstructions extends model {

    private $sections = array(
        "ce" => "<sections><section id='modem' name='Модемы'></section><section id='router' name='Роутеры'></section><section id='stb' name='STBs'></section><section id='voip' name='VoIPs'></section></sections>",
        "pe" => "<sections><section id='dslam' name='DSLAMs'></section><section id='etth' name='Ethernet-коммутаторы'></section><section id='core' name='Оборудование уровня агрегации и ядра'></section></sections>",
        "incidents" => "<sections><section id='xdsl' name='xDSL'></section><section id='fttb' name='FttB'></section><section id='iptv' name='IPTV'></section><section id='sip' name='SIP'></section></sections>",
        "soft" => "<sections><section id='browser' name='Настройки браузеров'></section><section id='connection' name='Настройки подключений'></section><section id='mail-client' name='Настройки почтовых клиентов'></section></sections>",
    );

    private function cloneNode($node, $doc){
        $nd = $doc -> createElement($node -> nodeName);

        foreach($node -> attributes as $value)
            $nd -> setAttribute($value -> nodeName, $value -> value);

        if(!$node -> childNodes)
            return $nd;

        foreach($node -> childNodes as $child) {
            if($child -> nodeName == "#text")
                $nd -> appendChild($doc -> createTextNode($child -> nodeValue));
            else
                $nd -> appendChild(cloneNode($child, $doc));
        }

        return $nd;
    }

    private function ensureSectionFileExists($subcat ,$dom) {
        if (!$this -> ensureFileExists($subcat)) {
            $dom -> load(DATA_PATH . $subcat . ".xml");

            $string = new DOMDocument("1.0", "utf-8");
            $string -> loadXML($this -> sections[$subcat]);
            $sections = $string -> documentElement -> childNodes;

            for ($i = 0; $i < $sections -> length; $i++) {
                $item = $this -> cloneNode($sections -> item($i), $dom);
                $dom -> childNodes -> item(0) -> appendChild($item);
            }

            file_put_contents(DATA_PATH . $subcat . ".xml", $dom -> saveXML());
            throw new Exception("There's no instructions yet.", ERROR_NO_ITEMS);
        }
    }

    function resolveParameters($num) {
        switch($num) {
            case 0: {
                return array (
                    "id" => "modem",
                    "group" => "ce",
                );
            }
            case 1: {
                return array (
                    "id" => "router",
                    "group" => "ce",
                );
            }
            case 2: {
                return array (
                    "id" => "stb",
                    "group" => "ce",
                );
            }
            case 3: {
                return array (
                    "id" => "voip",
                    "group" => "ce",
                );
            }
            case 4: {
                return array (
                    "id" => "dslam",
                    "group" => "pe",
                );
            }
            case 5: {
                return array (
                    "id" => "etth",
                    "group" => "pe",
                );
            }
            case 6: {
                return array (
                    "id" => "core",
                    "group" => "pe",
                );
            }
            case 7: {
                return array (
                    "id" => "xdsl",
                    "group" => "incidents",
                );
            }
            case 8: {
                return array (
                    "id" => "fttb",
                    "group" => "incidents",
                );
            }
            case 9: {
                return array (
                    "id" => "iptv",
                    "group" => "incidents",
                );
            }
            case 10: {
                return array (
                    "id" => "sip",
                    "group" => "incidents",
                );
            }
            case 11: {
                return array (
                    "id" => "browser",
                    "group" => "soft",
                );
            }
            case 12: {
                return array (
                    "id" => "connection",
                    "group" => "soft",
                );
            }
            case 13: {
                return array (
                    "id" => "mail-client",
                    "group" => "soft",
                );
            }
            default:
                throw new Exception("Unknown section: $num");
        }
    }

    function getList($subcat) {
        $dom = new DOMDocument("1.0", "utf-8");

        $this -> ensureSectionFileExists($subcat ,$dom);

        $dom -> load(DATA_PATH . $subcat . ".xml");
        $sections = $dom -> childNodes -> item(0) -> childNodes;

        $result[] = NULL;
        for ($i = 0; $i < $sections -> length; $i++) {
            $section = $sections -> item($i);

            $array = array(
                "sectionId" => $section -> attributes -> getNamedItem("id") -> nodeValue,
                "sectionName" => $section -> attributes -> getNamedItem("name") -> nodeValue,
                "children" => array(),
            );

            $items = $section -> childNodes;

            if ($items -> length != 0) {
                for ($j = 0; $j < $items -> length; $j++) {
                    array_push($array["children"], array(
                        "id" => $items -> item($j) -> childNodes -> item(0) -> nodeValue,
                        "name" => $items -> item($j) -> childNodes -> item(1) -> textContent,
                        "content" => $items -> item($j) -> childNodes -> item(2) -> textContent,
                    ));
                }
            }

            array_push($result, $array);
        }

        return array_slice($result, 1);
    }

    function getGroup($section) {
        switch($section) {
            case "modem":
            case "router":
            case "stb":
            case "voip": {
                return "ce";
            }
            case "dslam":
            case "etth":
            case "core": {
                return "pe";
            }
            case "xdsl":
            case "fttb":
            case "iptv":
            case "sip": {
                return "incidents";
            }
            case "browser":
            case "connection":
            case "mail-client": {
                return "soft";
            }
            default: {
            throw new Exception("Unknown section: $section", ERROR_UNKNOWN_SECTION);
            }
        }
    }

    function getItem($section, $id) {
        $file = $this -> getGroup($section);

        $dom = new DOMDocument("1.0", "utf-8");
        $this -> ensureSectionFileExists($file, $dom);
        $dom -> load(DATA_PATH . $file . ".xml");

        $items = $dom -> getElementsByTagName($section);

        for ($i = 0; $i < $items -> length; $i++) {
            if ($items -> item($i) -> childNodes -> item(0) -> nodeValue == $id) {
                return array (
                    "section" => $section,
                    "id" => $items -> item($i) -> childNodes -> item(0) -> nodeValue,
                    "name" => $items -> item($i) -> childNodes -> item(1) -> nodeValue,
                    "content" => $items -> item($i) -> childNodes -> item(2) -> nodeValue,
                );
            }
        }

        throw new Exception("Nothing found", ERROR_NOT_FOUND);
    }

    function addItem($section, $id, $name, $content) {

        switch ($section) {
            case "0":
            case "1":
            case "2":
            case "3":
            case "4":
            case "5":
            case "6":
            case "7":
            case "8":
            case "9":
            case "10":
            case "11":
            case "12":
            case "13": {
            $resolve = $this -> resolveParameters($section);
                break;
            }
            default : {
            $resolve = array(
                "id" => $section,
                "group" => $this -> getGroup($section),
            );
            }
        }

        $dom = new DOMDocument("1.0", "utf-8");
        $this -> ensureSectionFileExists($resolve["group"], $dom);
        $dom -> load(DATA_PATH . $resolve["group"] . ".xml");

        $sections = $dom -> childNodes -> item(0) -> childNodes;

        for ($i = 0; $i < $sections -> length; $i++) {
            if ($sections -> item($i) -> attributes -> getNamedItem("id") -> nodeValue == $resolve["id"]) {
                $newNode = $dom -> createElement($resolve["id"]);

                $newNodeChild = $dom -> createElement("id", $id);
                $newNode -> appendChild($newNodeChild);

                $newNodeChild = $dom -> createElement("name", $name);
                $newNode -> appendChild($newNodeChild);

                $newNodeChild = $dom -> createElement("content");
                $cdata = $dom -> createCDATASection($content);
                $newNodeChild -> appendChild($cdata);
                $newNode -> appendChild($newNodeChild);

                $sections -> item($i) -> appendChild($newNode);

                file_put_contents(DATA_PATH . $resolve["group"] . ".xml", $dom -> saveXML());
                return;
            }
        }

        throw new Exception("Wrong section number", ERROR_UNKNOWN_SECTION);
    }

    function deleteChildren($node) {
        while (isset($node -> firstChild)) {
            $this -> deleteChildren($node -> firstChild);
            $node -> removeChild($node -> firstChild);
        }
    }

    function removeItem($section, $id) {
        $group = $this -> getGroup($section);

        $dom = new DOMDocument("1.0", "utf-8");
        $this -> ensureSectionFileExists($group, $dom);
        $dom -> load(DATA_PATH . $group . ".xml");

        $items = $dom -> getElementsByTagName($section);

        for ($i = 0; $i < $items -> length; $i++) {
            if ($items -> item($i) -> childNodes -> item(0) -> nodeValue == $id) {
                $this -> deleteChildren($items -> item($i));
                $parent = $items -> item($i) -> parentNode;
                $parent -> removeChild($items -> item($i));

                file_put_contents(DATA_PATH . $group . ".xml", $dom -> saveXML());
                return;
            }
        }

        throw new Exception("Wrong section number", ERROR_UNKNOWN_SECTION);
    }

    function convertArrayToNode($dom, $item) {
        $node = $dom -> createElement($item["section"]);

        $newNodeChild = $dom -> createElement("id", $item["id"]);
        $node -> appendChild($newNodeChild);

        $newNodeChild = $dom -> createElement("name", $item["name"]);
        $node -> appendChild($newNodeChild);

        $newNodeChild = $dom -> createElement("content");
        $cdata = $dom -> createCDATASection($item["content"]);
        $newNodeChild -> appendChild($cdata);

        $node -> appendChild($newNodeChild);

        return $node;
    }

    function editItem($oldItem, $newItem) {
        $newResolve = $this -> resolveParameters($newItem["section"]);
        $newItem["section"] = $newResolve["id"];

        $this -> removeItem($oldItem["section"], $oldItem["id"]);
        $this -> addItem($newItem["section"], $newItem["id"], $newItem["name"], $newItem["content"]);
    }

}