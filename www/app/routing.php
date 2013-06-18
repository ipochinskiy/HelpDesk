<?php

class Route {

    static function start() {

        $controller_name = 'news';
        $action_name = 'index';

        $uriMap = parse_url($_SERVER['REQUEST_URI']);

        $routes = explode('/', $uriMap['path']);

        if (count($routes) > 3) {
            Route::errorHandler(new Exception("", ERROR_UNSUPPORTED_ROUTE));
        }

        if ( !empty($routes[1]) ) {
            $controller_name = $routes[1];
        }

        if ( !empty($routes[2]) ) {
            $action_name = $routes[2];
        }

        $controller_name = 'c' . ucfirst($controller_name);
        $controller_file = CONTROLLERS_PATH . $controller_name . '.php';

        if(file_exists($controller_file)) {
            include $controller_file;
        } else {
            Route::errorHandler(new Exception("", ERROR_NOT_FOUND));
        }

        if (class_exists($controller_name)) {
            $controller = new $controller_name;
        } else {
            Route::errorHandler(new Exception("", ERROR_NOT_FOUND));
        }

        $action = $action_name;

        if(method_exists($controller, $action)) {
            try {
                $controller -> $action();
            } catch (Exception $e) {
                Route::errorHandler($e);
            }
        } else {
            Route::errorHandler(new Exception("", ERROR_NOT_FOUND));
        }
    }

    function errorHandler($e) {
        include_once(CONTROLLERS_PATH . "cErrorHandler.php");
        $errorHandler = new cErrorHandler();

        switch ($e -> getCode()) {
            case ERROR_NO_FILES: {
                $errorHandler -> errorNoFiles($e);
                break;
            }
            case ERROR_NO_ITEMS: {
                $errorHandler -> errorNoItems($e);
                break;
            }
            case ERROR_UNKNOWN_SECTION: {
                $errorHandler -> errorUnknownSection($e);
                break;
            }
            case ERROR_NOT_FOUND: {
                $errorHandler -> errorNotFound($e);
                break;
            }
            case ERROR_UNSUPPORTED_ROUTE: {
                $errorHandler -> errorUnsupportedRoute($e);
                break;
            }
            default: {
            $errorHandler -> index($e);
            }
        }
    }

}
