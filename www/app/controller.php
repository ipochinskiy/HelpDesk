<?php

class controller {

    public $view;
    public $model;

    function __construct() {
        $this -> view = new view();
    }

    function actionIndex() {
    }

}

?>