<?php

class cErrorHandler extends controller {

    function index() {
    }

    function errorNoFiles($e) {
        $this -> view -> showView("errors.php", $e);
    }

    function errorNoItems($e) {
        $this -> view -> showView("errors.php", $e);
    }

    function errorUnknownSection($e) {
        $this -> view -> showView("errors.php", $e);
    }

    function errorNotFound($e) {
        $this -> view -> showView("errors.php", $e);
    }

    function errorUnsupportedRoute($e) {
        $this -> view -> showView("errors.php", $e);
    }

    function errorUnknownError($e) {
        $this -> view -> showView("errors.php", $e);
    }
}