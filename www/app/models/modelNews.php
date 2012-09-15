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
                                           "auth" => $newsItem[1],
                                           "tags" => $newsItem[2],
                                           "text" => $newsItem[3]));
        }

        return array_reverse(array_slice($resultArray, 1));
    }

    function addNewsItem($newItemToAdd) {
         if (is_writable(FILES_PATH . "newsList.csv")) {

             if (!$newsListFileHandler = fopen(FILES_PATH . "newsList.csv", 'a')) {
                 throw new Exception("Can't open file newsList.csv...");
             }

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