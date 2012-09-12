<?php

class controllerMain extends controller {

    function actionIndex() {
        $this -> model -> getNewsList();
        $this -> view -> showView('viewMain.php');
    }

}

?>