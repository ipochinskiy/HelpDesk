<?php

require MODELS_PATH . "mVips.php";

class cVips extends controller{

    function __construct() {
        $this -> model = new mVips();
        $this -> view = new view();
    }

    function index() {
        try {
            if (count($_GET) == 0) {
                $this -> view -> showView('vips_list.php', $this -> model -> getList());
            } else {
                $this -> view -> showView('vips_item.php', $this -> model -> getItem($_GET["id"]));
            }
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

    function add() {
        try {
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
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

}