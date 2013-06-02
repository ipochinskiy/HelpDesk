<?php

class c404 extends controller {

    function index() {
        $this->view->showView('error404.php');
    }

}