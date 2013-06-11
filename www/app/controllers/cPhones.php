<?php

require MODELS_PATH . "mPhones.php";

class cPhones extends controller {

    function __construct() {
        $this -> model = new mPhones();
        $this -> view = new view();
    }

    function index() {
        try {
            $this -> view -> showView('phones.php', $this -> model -> getList());
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

}