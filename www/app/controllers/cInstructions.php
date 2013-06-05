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
                $data = $this -> model -> getCe();
            }

            if (count($_GET) == 0) {
                $this -> view -> showView('instructions_list.php', $data);
            } else {
                $this -> view -> showView('instructions_item.php', $this -> model -> getInstruction($_GET["section"], $_GET["item"]));
            }
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

    function ce() {
        $this -> index($this -> model -> getCe());
    }

    function pe() {
        $this -> index($this -> model -> getPe());
    }

    function incidents() {
        $this -> index($this -> model -> getIncidents());
    }

    function soft() {
        $this -> index($this -> model -> getSoft());
    }

    function add() {
        try {
            if (count($_POST) == 0) {
                $this -> view -> showView('instructions_editor.php', false);
            } else {
                if ($_POST["section"] == null || $_POST["alias"] == null || $_POST["name"] == null) {
                    $this -> view -> showView('instructions_editor.php', true);
                    return;
                }
                $this -> model -> addInstruction($_POST["section"], $_POST["alias"], $_POST["name"], $_POST["content"]);
                $this -> index();
//                $this -> redirect("");
            }
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

}