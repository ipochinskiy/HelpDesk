<?php

require MODELS_PATH . "modelNews.php";

class controllerNews extends controller {

    function __construct() {
        $this -> model = new modelNews();
        $this -> view = new view();
    }

    function actionIndex() {
        try {
            $this -> view -> showView('viewNews.php', $this -> model -> getNewsList());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function actionAddNewsItem() {
        $newsItemForAddition = array("date" => date("d/m/Y H:i"),
                                     "tags" => $_GET['tags'],
                                     "text" => $_GET['text']);

        try {
            $this -> model -> addNewsItem($newsItemForAddition);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        $this -> actionIndex();
    }

}

?>