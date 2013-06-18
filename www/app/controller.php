<?php

abstract class controller {

    protected $view;
    protected $model;

    function __construct() {
        $this -> view = new view();
    }

    abstract function index();
}