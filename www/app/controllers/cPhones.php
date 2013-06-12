<?php

require MODELS_PATH . "mPhones.php";

class cPhones extends controller {

    function __construct() {
        $this -> model = new mPhones();
        $this -> view = new view();
    }

    function index() {
        try {
            $this -> view -> showView('phones.php', $this -> model -> getPhones());
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

    function edit() {
        try {
            if (count($_POST) == 0) {
                $this -> view -> showView('editor.php', array(
                    "formActionLink" => "/phones/edit",
                    "allFieldsRequired" => false,
                    "content" => $this -> model -> getPhones(),
                ));
            } else {
                $this -> model -> editPhones($_POST["content"]);
                $this -> index();
            }
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

}