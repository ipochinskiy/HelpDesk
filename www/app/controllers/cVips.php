<?php

require MODELS_PATH . "mVips.php";

class cVips extends controller{

    function __construct() {
        $this -> model = new mVips();
        $this -> view = new view();
    }

    function index() {
        try {
            $this -> view -> showView('vips_list.php', $this -> model -> getList());
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

}