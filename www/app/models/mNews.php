<?php

class mNews extends model {

    function getNewsList() {
        if ( !file_exists(FILES_PATH . "news.csv") ) {
            //TODO: why to throw exception? maybe we should just create this file?
            throw new Exception("It seems there is no even news.csv file...");
        }

        $newsList = file(FILES_PATH . "news.csv");

        if (count($newsList) == 1 && $newsList[0] == '') {
            //TODO: why to throw exception? maybe we should just show a user-friendly message that there's no cNews?
            throw new Exception("It seems there is news.csv file, but still no newsItems there...");
        }

        $resultArray[] = null;

        foreach ($newsList as $newsItem) {
            $newsItem = explode(';', $newsItem);
            array_push($resultArray, array("date" => $newsItem[0],
                                           "author" => $newsItem[1],
                                           "text" => $newsItem[2]));
        }

        return array_reverse(array_slice($resultArray, 1));
    }

    function addNewsItem($itemToAdd) {
        if (is_writable(FILES_PATH . "news.csv")) {

            if (!$newsListFileHandler = fopen(FILES_PATH . "news.csv", 'a')) {
                throw new Exception("Can't open file news.csv...");
            }

            $itemToAdd["text"] = str_replace("+", " ", urldecode($itemToAdd["text"]));
            $itemToAdd["text"] = str_replace("%21", "", $itemToAdd["text"]);
            $itemToAdd["text"] = str_replace(";", ",", $itemToAdd["text"]);

            $itemToAdd["author"] = str_replace("+", " ", urldecode($itemToAdd["author"]));
            $itemToAdd["author"] = str_replace("%21", "", $itemToAdd["author"]);
            $itemToAdd["author"] = str_replace(";", ",", $itemToAdd["author"]);

            $itemToAdd = $itemToAdd["date"] . ";" . $itemToAdd["author"] . ";" . $itemToAdd["text"];

            if (fwrite($newsListFileHandler, $itemToAdd . PHP_EOL) === FALSE) {
                throw new Exception("Can't write to file news.csv...");
            }

            fclose($newsListFileHandler);

        } else {
            throw new Exception("File news.csv is unable to write in...");
        }
    }
}