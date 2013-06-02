<?php

require PORTAL_ROOT_PATH . "config.php";

class mInstructions extends model {

    function getCe() {
        return $this -> getList(array(
                array(
                    "key" => "Модемы",
                    "id" => "modems",
                    "items" =>  array(),
                ),
                array(
                    "key" => "Роутеры",
                    "id" => "routers",
                    "items" => array(),
                ),
                array(
                    "key" => "STBs",
                    "id" => "stbs",
                    "items" => array(),
                ),
                array(
                    "key" => "VoIPs",
                    "id" => "voips",
                    "items" => array(),
                ),
            )
        );
    }

    function getPe() {
        return $this -> getList(array(
                array(
                    "key" => "DSLAMs",
                    "id" => "dslams",
                    "items" => array(),
                ),
                array(
                    "key" => "Ethernet-коммутаторы",
                    "id" => "etth_switches",
                    "items" => array(),
                ),
                array(
                    "key" => "Оборудование уровня агрегации и ядра",
                    "id" => "core_aggr_devices",
                    "items" => array(),
                ),
            )
        );
    }

    function getIncidents() {
        return $this -> getList(array(
                array(
                    "key" => "xDSL",
                    "id" => "xdsl",
                    "items" => array(),
                ),
                array(
                    "key" => "FttB",
                    "id" => "fttb",
                    "items" => array(),
                ),
                array(
                    "key" => "IPTV",
                    "id" => "iptv",
                    "items" => array(),
                ),
                array(
                    "key" => "SIP",
                    "id" => "sip",
                    "items" => array(),
                ),
            )
        );
    }

    function getSoft() {
        return $this -> getList(array(

            )
        );
    }

    function getList($instructions) {
        $resultArray[] = null;

        foreach ($instructions as $section) {

            if (!file_exists(FILES_PATH . $section["id"] . ".csv")) {
                //TODO: why to throw exception? maybe we should just create this file?
                throw new Exception("It seems there is no even needed files...");
            }

            $elements = file(FILES_PATH . $section["id"] . ".csv");

            if (count($elements) == 1 && $elements[0] == '') {
                //TODO: why to throw exception? maybe we should just show a user-friendly message that there's no modems?
                throw new Exception("It seems there is $elements file, but still no elements inside...");
            }

            foreach ($elements as $element) {
                $item = explode(';', $element);

                if (file_exists(HTML_PATH . $section["id"] . "/" . $item[0] . ".html")) {
                    array_push($resultArray, array(
                            "section" => $section["id"],
                            "id" => $item[0],
                            "key" => $item[1],
                        )
                    );
                }
            }
        }

        return array_slice($resultArray, 1);
    }

    function getInstruction($section, $item) {
        if (array_search($item . ".html", scandir(HTML_PATH . $section . "/")) != false) {
            try {
                $content =  array("content" => file_get_contents(HTML_PATH . $section . "/" . $item . ".html"));
            } catch (Exception $e) {
                throw new Exception("Can't read file $item in " . HTML_PATH . $section . "/");
            }
        }

//        if (array_search($item . ".html", scandir(HTML_PATH . "modems/")) != false) {
//            try {
//                $content = file_get_contents(HTML_PATH . "modems/" . $item . ".html");
//            } catch (Exception $e) {
//                throw new Exception("Can't read file $item in " . HTML_PATH . "modems/");
//            }
//        } elseif (array_search($item . ".html", scandir(HTML_PATH . "routers/")) != false) {
//            try {
//                $content = str_replace($item . ".files",
//                    HTML_PATH . "routers/" . $item . ".files",
//                    file_get_contents(HTML_PATH . "routers/" . $item . ".html"));
//            } catch (Exception $e) {
//                throw new Exception("Can't read file $item in " . HTML_PATH . "routers/");
//            }
//        } elseif (array_search($item . ".html", scandir(HTML_PATH . "stbs/")) != false) {
//            try {
//                $content = str_replace($item . ".files",
//                    HTML_PATH . "stbs/" . $item . ".files",
//                    file_get_contents(HTML_PATH . "stbs/" . $item . ".html"));
//            } catch (Exception $e) {
//                throw new Exception("Can't read file $item in " . HTML_PATH . "stbs/");
//            }
//        } elseif (array_search($item . ".html", scandir(HTML_PATH . "voips/")) != false) {
//            try {
//                $content = str_replace($item . ".files",
//                    HTML_PATH . "voips/" . $item . ".files",
//                    file_get_contents(HTML_PATH . "voips/" . $item . ".html"));
//            } catch (Exception $e) {
//                throw new Exception("Can't read file $item in " . HTML_PATH . "voips/");
//            }
//        } else {
//            throw new Exception("There's no instruction for $item");
//        }

        if (array_search($item . ".doc", scandir(DOC_PATH)) != false) {
            $content["link"] =  "/files/doc/" . $item . ".doc";
        }

        return $content;
    }

    function addInstruction($section, $id, $name, $content) {
        switch($section) {
            case 0: {
                $fileName = FILES_PATH . "modems.csv";
                break;
            }
            case 1: {
                $fileName = FILES_PATH . "routers.csv";
                break;
            }
            case 2: {
                $fileName = FILES_PATH . "stbs.csv";
                break;
            }
            case 3: {
                $fileName = FILES_PATH . "voips.csv";
                break;
            }
            default:
                throw new Exception("Unknown section.");
        }

        foreach (file($fileName) as $e) {
            if (array_search($id, explode(";", $e)) !== false) {
                throw new Exception("This ID is already used.");
            }
        }

        if (!file_put_contents($fileName, $id . ";" . $name . "\n", FILE_APPEND))
        {
            die ("Ошибка записи в файл");
        }

        $fileStream = fopen(HTML_PATH . "modems/" . $id . ".html", "a");
        if (!fwrite($fileStream, $content))
        {
            die ("Ошибка создания файла");
        }
        fclose($fileStream);
    }
}