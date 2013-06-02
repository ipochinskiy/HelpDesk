<?php

class view {

    function showView($viewToShow, $data = null)
    {
        if(is_array($data)) {
            extract($data);
        }
        include VIEWS_PATH . $viewToShow;
    }

}