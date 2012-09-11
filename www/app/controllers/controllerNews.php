<?php

class controllerNews extends controller {

    function actionIndex() {
        $this -> model -> getNewsList();
        $this -> view -> showView('viewNews.php');
    }

}

?>