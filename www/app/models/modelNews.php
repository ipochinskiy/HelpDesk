<?php

class modelNews extends model {

    function getNewsList() {
        if (file_exists(FILES_PATH . "newsList.csv")) {
            $newsList = file_get_contents(FILES_PATH . "newsList.csv");
        //TODO: Add what to do with file newsList.csv
        }
    }
}

?>