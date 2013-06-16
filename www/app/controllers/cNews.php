<?php

require MODELS_PATH . "mNews.php";

class cNews extends controller {

    function __construct() {
        $this -> model = new mNews();
        $this -> view = new view();
    }

    function index() {
        try {
            $this -> view -> showView('news.php', $this -> model -> getList());
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

    function add() {
        try {
            $this -> model -> addItem(array(
                "date" => date("d/m/Y H:i"),
                "author" => $_POST['author'],
                "text" => $_POST['text']
            ));
        } catch (Exception $e) {
            echo $e -> getMessage();
        }

        $this -> index();
    }

}