<?php

require MODELS_PATH . "mVips.php";

class cVips extends controller{

    function __construct() {
        $this -> model = new mVips();
        $this -> view = new view();
    }

    function index() {
        if (count($_GET) == 0) {
            $this -> view -> showView('vips_list.php', $this -> model -> getList());
        } else {
            $item = $this -> model -> getItem($_GET["id"]);
            $this -> view -> showView('vips_item.php', array(
                "id" => $_GET["id"],
                "name" => $item["name"],
                "content" => $item["content"],
            ));
        }
    }

    function add() {
        if (count($_POST) == 0) {
            $this -> view -> showView('editor.php', array(
                "formActionLink" => "/vips/add",
                "allFieldsRequired" => false,
                "alias" => "",
                "name" => "",
                "content" => "",
            ));
        } else {
            if ($_POST["alias"] == null || $_POST["name"] == null) {
                $this -> view -> showView('editor.php', array(
                    "formActionLink" => "/vips/add",
                    "allFieldsRequired" => true,
                    "alias" => $_POST["alias"],
                    "name" => $_POST["name"],
                    "content" => $_POST["content"],
                ));
                return;
            }
            $this -> model -> addItem(array(
                "id" => $_POST["alias"],
                "name" => $_POST["name"],
                "content" => $_POST['content'],
            ));
            $this -> index();
        }
    }

    function edit() {
        if (count($_POST) == 0) {
            if (!isset($_GET["id"])) {
                $this -> view -> showView("errors.php", new Exception("", ERROR_WRONG_CALL));
            }
            $item = $this -> model -> getItem($_GET["id"]);
            $this -> view -> showView("editor.php", array(
                "formActionLink" => "/vips/edit",
                "allFieldsRequired" => false,
                "alias" => $_GET["id"],
                "name" => $item["name"],
                "content" => $item["content"],
            ));
        } else {
            $this -> model -> editItem(
                $_POST["oldAlias"],
                array(
                    "id" => $_POST["alias"],
                    "name" => $_POST["name"],
                    "content" => $_POST["content"],
                ));
            $item = $this -> model -> getItem($_POST["alias"]);
            $this -> view -> showView('vips_item.php', array(
                "id" => $_POST["alias"],
                "name" => $item["name"],
                "content" => $item["content"],
            ));
        }
    }

    function delete() {
        if (count($_GET) == 0 || !isset($_GET["id"])) {
            $this -> view -> showView("errors.php", new Exception("", ERROR_WRONG_CALL));
        } else {
            $this -> model -> removeItem($_GET["id"]);
            $_GET = NULL;
            $this -> index(NULL);
        }
    }

}