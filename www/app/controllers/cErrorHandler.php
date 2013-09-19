<?php

class cErrorHandler extends controller {

    function index($e) {
        $this -> view -> showView("errors.php", $e);
    }

    function errorNoFiles($e) {
        $this -> index($e);
    }

    function errorNoItems($e) {
        $this -> index($e);
    }

    function errorUnknownSection($e) {
        $this -> index($e);
    }

    function errorNotFound($e) {
        $this -> index($e);
    }

    function errorUnsupportedRoute($e) {
        $this -> index($e);
    }

    function errorUnknownError($e) {
        $this -> index($e);
    }
}
