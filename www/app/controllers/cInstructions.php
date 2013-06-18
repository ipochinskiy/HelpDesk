<?php

require MODELS_PATH . "mInstructions.php";

class cInstructions extends controller {

    function __construct() {
        $this -> model = new mInstructions();
        $this -> view = new view();
    }

    function index($data = NULL) {
        if ($data == NULL) {
            $data = $this -> model -> getList("ce");
        }

        if (count($_GET) == 0) {
            $this -> view -> showView('instructions_list.php', $data);
        } else {
            $this -> view -> showView('instructions_item.php', $this -> model -> getItem($_GET["section"], $_GET["item"]));
        }
    }

    function ce() {
        $this -> index($this -> model -> getList("ce"));
    }

    function pe() {
        $this -> index($this -> model -> getList("pe"));
    }

    function incidents() {
        $this -> index($this -> model -> getList("incidents"));
    }

    function soft() {
        $this -> index($this -> model -> getList("soft"));
    }

    function add() {
        if (count($_POST) == 0) {
            $this -> view -> showView('editor.php', array(
                "formActionLink" => "/instructions/add",
                "allFieldsRequired" => false,
                "alias" => "",
                "name" => "",
                "content" => "",
            ));
        } else {
            $this -> model -> addItem($_POST["section"], $_POST["alias"], $_POST["name"], $_POST["content"]);
            $this -> index();
        }
    }

    function edit() {
        if (count($_POST) == 0) {
            if (!isset($_GET["section"]) || !isset($_GET["id"])) {
                $this -> view -> showView("errors.php", new Exception("", ERROR_WRONG_CALL));
            }
            $item = $this -> model -> getItem($_GET["section"], $_GET["id"]);
            $this -> view -> showView("editor.php", array(
                "formActionLink" => "/instructions/edit",
                "allFieldsRequired" => false,
                "alias" => $item["id"],
                "name" => $item["name"],
                "content" => $item["content"],
            ));
        } else {
            $this -> model -> editItem(
                array(
                    "section" => $_POST["oldSection"],
                    "id" => $_POST["oldAlias"],
                ),
                array(
                    "section" => $_POST["section"],
                    "id" => $_POST["alias"],
                    "name" => $_POST["name"],
                    "content" => $_POST["content"],
                ));
            $res = $this -> model -> resolveParameters($_POST["section"]);
            $this -> view -> showView('instructions_item.php', $this -> model -> getItem($res["id"], $_POST["alias"]));
        }
    }

    function delete() {
        if (count($_GET) == 0 || !isset($_GET["section"]) || !isset($_GET["id"])) {
            $this -> view -> showView("errors.php", new Exception("", ERROR_WRONG_CALL));
        } else {
            $this -> model -> removeItem($_GET["section"], $_GET["id"]);
            $_GET = NULL;
            $this -> index(NULL);
        }
    }

}