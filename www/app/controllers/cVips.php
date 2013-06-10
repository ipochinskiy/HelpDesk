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
                $this -> view -> showView('vips_editor.php', false);
            } else {
                if ($_POST["alias"] == null || $_POST["name"] == null) {
                    $this -> view -> showView('vips_editor.php', true);
                    return;
                }
                $this -> model -> addItem($_POST["alias"], $_POST["name"], $_POST["content"]);
                $this -> index();
//                $this -> redirect("");
            }
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

}