<?php

require MODELS_PATH . "mNews.php";

class cNews extends controller {

    function __construct() {
        $this -> model = new mNews();
        $this -> view = new view();
    }

    function index() {
        $this -> view -> showView('news.php', $this -> model -> getList());
    }

    function add() {
        $this -> model -> addItem(array(
            "date" => date("d/m/Y H:i"),
            "author" => $_POST['author'],
            "text" => $_POST['text']
        ));
        $this -> index();
    }

}