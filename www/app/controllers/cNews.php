<?php

require MODELS_PATH . "mNews.php";

class cNews extends controller {

    function __construct() {
        $this -> model = new mNews();
        $this -> view = new view();
    }

    function index() {
        try {
            $this -> view -> showView('news.php', $this -> model -> getNewsList());
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

    function add() {
        $newsItemForAddition = array("date" => date("d/m/Y H:i"),
                                     "author" => $_GET['author'],
                                     "text" => $_GET['text']);

        try {
            $this -> model -> addNewsItem($newsItemForAddition);
        } catch (Exception $e) {
            echo $e -> getMessage();
        }

        $this -> index();
    }

}