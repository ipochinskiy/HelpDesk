<?php

class controllerNews extends controller {

    function actionIndex() {
        $this -> view -> showView('viewNews.php');
    }

}

?>