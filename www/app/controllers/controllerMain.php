<?php

class controllerMain extends controller {

    function actionIndex() {
        $this -> view -> showView('viewMain.php');
    }

}

?>