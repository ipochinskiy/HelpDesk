<?php

class controller404 extends controller {

    function actionIndex() {
        $this->view->showView('view404.php');
    }

}