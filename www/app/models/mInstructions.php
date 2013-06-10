<?php

class mInstructions extends model {

    private $sections = array(
        "ce" => "<sections><section id='modem' name='Модемы'></section><section id='router' name='Роутеры'></section><section id='stb' name='STBs'></section><section id='voip' name='VoIPs'></section></sections>",
        "pe" => "<sections><section id='dslam' name='DSLAMs'></section><section id='etth' name='Ethernet-коммутаторы'></section><section id='core' name='Оборудование уровня агрегации и ядра'></section></sections>",
        "incidents" => "<sections><section id='xdsl' name='xDSL'></section><section id='fttb' name='FttB'></section><section id='iptv' name='IPTV'></section><section id='sip' name='SIP'></section></sections>",
        "soft" => "<sections><section id='browser' name='Настройки браузеров'></section></sections>",
    );

    function getList($subcat) {
        $this -> ensureFileExist(DATA_PATH . $subcat . ".xml", $this -> sections[$subcat]);

        $xml = new SimpleXMLElement(DATA_PATH . $subcat . ".xml", NULL, TRUE);

        $resultArray[] = NULL;
        foreach ($xml -> section as $section) {

            $attr = $section -> attributes();
            $array = array(
                "sectionId" => $attr["id"],
                "sectionName" => $attr["name"],
                "children" => array(),
            );

            foreach ($section -> children() as $item) {
                array_push($array["children"], $item);
            }
            array_push($resultArray, $array);

        }

        return array_slice($resultArray, 1);
    }

    function getItem($section, $item) {
        switch($section) {
            case "modem":
            case "router":
            case "stb":
            case "voip": {
                $file = DATA_PATH . "ce.xml";
                break;
            }
            case "dslam":
            case "etth":
            case "core": {
                $file = DATA_PATH . "pe.xml";
                break;
            }
            case "xdsl":
            case "fttb":
            case "iptv":
            case "sip": {
                $file = DATA_PATH . "incidents.xml";
                break;
            }
            case "browser": {
                $file = DATA_PATH . "soft.xml";
                break;
            }
            default: {
                throw new Exception("Unknown section: $section");
            }
        }

        $xml = new SimpleXMLElement($file, NULL, TRUE);
        foreach ($xml -> section as $section) {
            foreach ($section -> children() as $child) {
                if ($child -> id == $item) {
                    return array (
                        "name" => $child -> name,
                        "content" => $child -> content,
                    );
                }
            }
        }

    }

    function addItem($sectionNum, $id, $name, $content) {
        switch($sectionNum) {
            case 0: {
                $sectionId = "modem";
                $group = "ce";
                break;
            }
            case 1: {
                $sectionId = "router";
                $group = "ce";
                break;
            }
            case 2: {
                $sectionId = "stb";
                $group = "ce";
                break;
            }
            case 3: {
                $sectionId = "voip";
                $group = "ce";
                break;
            }
            case 4: {
                $sectionId = "dslam";
                $group = "pe";
                break;
            }
            case 5: {
                $sectionId = "etth";
                $group = "pe";
                break;
            }
            case 6: {
                $sectionId = "core";
                $group = "pe";
                break;
            }
            case 7: {
                $sectionId = "xdsl";
                $group = "incidents";
                break;
            }
            case 8: {
                $sectionId = "fttb";
                $group = "incidents";
                break;
            }
            case 9: {
                $sectionId = "iptv";
                $group = "incidents";
                break;
            }
            case 10: {
                $sectionId = "sip";
                $group = "incidents";
                break;
            }
            case 11: {
                $sectionId = "browser";
                $group = "soft";
                break;
            }
            default:
                throw new Exception("Unknown section: $sectionNum");
        }

        $text = $this -> sections[$group];

        $this -> ensureFileExist(DATA_PATH . $group . ".xml", $text);

        $xml = new SimpleXMLElement(DATA_PATH . $group . ".xml", NULL, TRUE);

        foreach ($xml -> section as $sectionNum) {
            $attr = $sectionNum -> attributes();
            if ($attr["id"] == $sectionId) {
                $item = $sectionNum -> addChild($sectionId);
                $item -> addChild("id", $id);
                $item -> addChild("name", $name);
                $item -> addChild("content", $content);

                $xml->saveXML(DATA_PATH . $group . ".xml");
                return;
            }
        }
    }
}