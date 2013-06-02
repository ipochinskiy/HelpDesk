<?php

abstract class controller {

    protected  $view;
    protected $model;

    function __construct() {
        $this -> view = new view();
    }

    abstract function index();

    protected function redirect($url, $timeout = 0) {
        echo "
            <html>
				<head>
					<meta http-equiv='Refresh' content='1'; URL = $url'>
				</head>
        ";
    }

}