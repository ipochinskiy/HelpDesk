<?php

require MODELS_PATH . "mInstructions.php";

class cInstructions extends controller {

    function __construct() {
        $this -> model = new mInstructions();
        $this -> view = new view();
    }

    function index($data = null) {
        try {
            if ($data === null) {
                $data = $this -> model -> getList("ce");
            }

            if (count($_GET) == 0) {
                $this -> view -> showView('instructions_list.php', $data);
            } else {
                $this -> view -> showView('instructions_item.php', $this -> model -> getItem($_GET["section"], $_GET["item"]));
            }
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

    function ce() {
        try {
            $this -> index($this -> model -> getList("ce"));
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

    function pe() {
        try {
            $this -> index($this -> model -> getList("pe"));
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

    function incidents() {
        try {
            $this -> index($this -> model -> getList("incidents"));
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

    function soft() {
        try {
            $this -> index($this -> model -> getList("soft"));
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

    function add() {
        try {
            if (count($_POST) == 0) {
                $this -> view -> showView('editor.php', array(
                    "formActionLink" => "/instructions/add",
                    "allFieldsRequired" => false,
                    "alias" => "",
                    "name" => "",
                    "content" => "",
                ));
            } else {
                if (trim($_POST["section"]) == "" || trim($_POST["alias"]) == "" || trim($_POST["name"]) == "") {
                    $this -> view -> showView('editor.php', array(
                        "formActionLink" => "/instructions/add",
                        "allFieldsRequired" => true,
                        "alias" => $_POST["alias"],
                        "name" => $_POST["name"],
                        "content" => $_POST["content"],
                    ));
                    return;
                }
                $this -> model -> addItem($_POST["section"], $_POST["alias"], $_POST["name"], $_POST["content"]);
                $this -> index();
            }
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

}