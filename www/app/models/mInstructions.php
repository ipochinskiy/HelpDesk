<?php

class mInstructions extends model {

    function getList($subcat) {

        if (!file_exists(DATA_PATH . $subcat . ".xml")) {
            //TODO: why to throw exception? maybe we should just create this file?
            throw new Exception("It seems there is no even needed files...");
        }

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

    function getInstruction($section, $item) {
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
                throw new Exception("Unknown section.");
            }
        }

        $xml = new SimpleXMLElement($file, NULL, TRUE);
        foreach ($xml -> section as $section) {
            foreach ($section -> children() as $children) {
                if ($children -> id == $item) {
                    return $children -> content;
                }
            }
        }

    }

    function addInstruction($section, $id, $name, $content) {
        switch($section) {
            case 0: {
                $secId = "modem";
                $fileName = DATA_PATH . "ce.xml";
                $text = "<?xml version='1.0' standalone='yes'?><sections><section id='modem' name='Модемы'></section><section id='router' name='Роутеры'></section><section id='stb' name='STBs'></section><section id='voip' name='VoIPs'></section></sections>";
                break;
            }
            case 1: {
                $secId = "router";
                $fileName = DATA_PATH . "ce.xml";
                $text = "<?xml version='1.0' standalone='yes'?><sections><section id='modem' name='Модемы'></section><section id='router' name='Роутеры'></section><section id='stb' name='STBs'></section><section id='voip' name='VoIPs'></section></sections>";
                break;
            }
            case 2: {
                $secId = "stb";
                $fileName = DATA_PATH . "ce.xml";
                $text = "<?xml version='1.0' standalone='yes'?><sections><section id='modem' name='Модемы'></section><section id='router' name='Роутеры'></section><section id='stb' name='STBs'></section><section id='voip' name='VoIPs'></section></sections>";
                break;
            }
            case 3: {
                $secId = "voip";
                $fileName = DATA_PATH . "ce.xml";
                $text = "<?xml version='1.0' standalone='yes'?><sections><section id='modem' name='Модемы'></section><section id='router' name='Роутеры'></section><section id='stb' name='STBs'></section><section id='voip' name='VoIPs'></section></sections>";
                break;
            }
            case 4: {
                $secId = "dslam";
                $fileName = DATA_PATH . "pe.xml";
                $text = "<?xml version='1.0' standalone='yes'?><sections><section id='dslam' name='DSLAMs'></section><section id='etth' name='Ethernet-коммутаторы'></section><section id='core' name='Оборудование уровня агрегации и ядра'></section></sections>";
                break;
            }
            case 5: {
                $secId = "etth";
                $fileName = DATA_PATH . "pe.xml";
                $text = "<?xml version='1.0' standalone='yes'?><sections><section id='dslam' name='DSLAMs'></section><section id='etth' name='Ethernet-коммутаторы'></section><section id='core' name='Оборудование уровня агрегации и ядра'></section></sections>";
                break;
            }
            case 6: {
                $secId = "core";
                $fileName = DATA_PATH . "pe.xml";
                $text = "<?xml version='1.0' standalone='yes'?><sections><section id='dslam' name='DSLAMs'></section><section id='etth' name='Ethernet-коммутаторы'></section><section id='core' name='Оборудование уровня агрегации и ядра'></section></sections>";
                break;
            }
            case 7: {
                $secId = "xdsl";
                $fileName = DATA_PATH . "incidents.xml";
                $text = "<?xml version='1.0' standalone='yes'?><sections><section id='xdsl' name='xDSL'></section><section id='fttb' name='Fttb'></section><section id='iptv' name='IPTV'></section><section id='sip' name='SIP'></section></sections>";
                break;
            }
            case 8: {
                $secId = "fttb";
                $fileName = DATA_PATH . "incidents.xml";
                $text = "<?xml version='1.0' standalone='yes'?><sections><section id='xdsl' name='xDSL'></section><section id='fttb' name='Fttb'></section><section id='iptv' name='IPTV'></section><section id='sip' name='SIP'></section></sections>";
                break;
            }
            case 9: {
                $secId = "iptv";
                $fileName = DATA_PATH . "incidents.xml";
                $text = "<?xml version='1.0' standalone='yes'?><sections><section id='xdsl' name='xDSL'></section><section id='fttb' name='Fttb'></section><section id='iptv' name='IPTV'></section><section id='sip' name='SIP'></section></sections>";
                break;
            }
            case 10: {
                $secId = "sip";
                $fileName = DATA_PATH . "incidents.xml";
                $text = "<?xml version='1.0' standalone='yes'?><sections><section id='xdsl' name='xDSL'></section><section id='fttb' name='Fttb'></section><section id='iptv' name='IPTV'></section><section id='sip' name='SIP'></section></sections>";
                break;
            }
            case 11: {
                $secId = "browser";
                $fileName = DATA_PATH . "soft.xml";
                $text = "<?xml version='1.0' standalone='yes'?><sections><section id='browser' name='Настройки браузеров'></section></sections>";
                break;
            }
            default:
                throw new Exception("Unknown section.");
        }

        if (!file_exists($fileName)) {
            try {
                $file = fopen($fileName, "x");
                fwrite($file, $text);
                fclose($file);
            } catch (Exception $e) {
                throw new Exception("xml is not exist and not creatable");
            }
        }

        $xml = new SimpleXMLElement($fileName, NULL, TRUE);

        foreach ($xml -> section as $section) {
            $attr = $section -> attributes();
            if ($attr["id"] == $secId) {
                $item = $section -> addChild($secId);
                $item -> addChild("id", $id);
                $item -> addChild("name", $name);
                $item -> addChild("content", $content);

                $xml->saveXML($fileName);
                return;
            }
        }

        throw new Exception("Unknown section.");
    }
}