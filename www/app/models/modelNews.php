<?php

class modelNews extends model {

    function getNewsList() {
        if ( !file_exists(FILES_PATH . "newsList.csv") ) {
            throw new Exception("It seems there is no even newsList.csv file...");
        }

        $newsList = file(FILES_PATH . "newsList.csv");

        if (count($newsList) == 1 && $newsList[0] == '') {
            throw new Exception("It seems there is newsList.csv file, but still no newsItems there...");
        }

        $resultArray[] = null;

        foreach ($newsList as $newsItem) {
            $newsItem = explode(';', $newsItem);
            array_push($resultArray, array("date" => $newsItem[0],
                                           "tags" => $newsItem[1],
                                           "text" => $newsItem[2]));
        }

        return array_reverse(array_slice($resultArray, 1));
    }

    function addNewsItem($newItemToAdd) {
        if (is_writable(FILES_PATH . "newsList.csv")) {

            if (!$newsListFileHandler = fopen(FILES_PATH . "newsList.csv", 'a')) {
                throw new Exception("Can't open file newsList.csv...");
            }

            $newItemToAdd["text"] = str_replace("+", " ", urldecode($newItemToAdd["text"]));
            $newItemToAdd["text"] = str_replace("%21", "", $newItemToAdd["text"]);
            $newItemToAdd["text"] = str_replace(";", ",", $newItemToAdd["text"]);

            $newItemToAdd["tags"] = str_replace("+", " ", urldecode($newItemToAdd["tags"]));
            $newItemToAdd["tags"] = str_replace("%21", "", $newItemToAdd["tags"]);
            $newItemToAdd["tags"] = str_replace(";", ",", $newItemToAdd["tags"]);

            $newItemToAdd = $newItemToAdd["date"] . ";" . $newItemToAdd["tags"] . ";" . $newItemToAdd["text"];

            if (fwrite($newsListFileHandler, $newItemToAdd . PHP_EOL) === FALSE) {
                throw new Exception("Can't write to file newsList.csv...");
            }

            fclose($newsListFileHandler);

        } else {
            throw new Exception("File newsList.csv is unable to write in...");
        }
    }
}

?>