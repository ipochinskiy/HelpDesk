<?php

class controller {

    public $view;
    public $model;

    function __construct() {
        $this -> view = new view();
        $this -> model = new model();
    }

    function actionIndex() {
    }

}

?>