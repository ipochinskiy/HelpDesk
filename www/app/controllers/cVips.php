<?php

class cVips extends controller{

    function __construct() {
        $this -> model = new mVips();
        $this -> view = new view();
    }

    function index() {
        try {
            $this -> view -> showView('vips.php', $this -> model -> getNewsList());
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

}