<?php

class Route {

    static function start() {
        $controller_name = 'main';
        $action_name = 'index';

        $uriMap = parse_url($_SERVER['REQUEST_URI']);

        $routes = explode('/', $uriMap[path]);

        if (count($routes) > 3) {
            die("Unexpected route!");
        }

        if ( !empty($routes[1]) ) {
            $controller_name = $routes[1];
        }

        if ( !empty($routes[2]) ) {
            $action_name = $routes[2];
        }

        $queryGetParams = explode('&', $uriMap[query]);

        foreach ($queryGetParams as $queryItem) {
            $queryItemArray = explode('=', $queryItem);
            $_GET[$queryItemArray[0]] = $queryItemArray[1];
        }

        $controller_name = 'controller' . ucfirst($controller_name);
        $action_name = 'action' . ucfirst($action_name);

        $controller_file = CONTROLLERS_PATH . $controller_name . '.php';

        if(file_exists($controller_file)) {
            include $controller_file;
        } else {
            Route::error404();
        }

        $controller = new $controller_name;
        $action = $action_name;

        if(method_exists($controller, $action)) {
            $controller -> $action();
        } else {
            Route::error404();
        }
    }

    function error404() {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }

}