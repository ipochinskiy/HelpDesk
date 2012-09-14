<?php

require MODELS_PATH . "modelNews.php";

class controllerNews extends controller {

    function actionIndex() {
        $this -> model = new modelNews();
        $this -> model -> getNewsList();
        $this -> view -> showView('viewNews.php');
    }

    function actionAddNewsItem() {
        echo "Hello from actionAddNewsItem!!<br />" . $_GET['text'] . "<br />" . $_GET['tags'];
    }

}

?>