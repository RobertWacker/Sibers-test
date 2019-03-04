<?php

namespace app\core;

use app\core\View;

class Router {

    /**
     * List of routes
     *
     * @var array
     */
    protected $routes;

    /**
     * Contains action and controller names
     *
     * @var integer
     */
    protected $params;

    /**
     * request of URL
     *
     * @var integer
     */
    protected $uri;

    /**
     * Prepare a router
     *
     * @return array
     */
    public function __construct(){

        // Get routes list
        $routes = include(CONFIG.'routes.php');

        // Write to variable
        $this->routes = $routes;

        // Delete slash
        $this->uri = trim($_SERVER['REQUEST_URI'], '/');
    }

    /**
     * Check the match request and route
     *
     * @return boolen
     */
    public function match() {

        // Go over the routes
        foreach($this->routes as $uriPattern => $patch) {
            if (preg_match('~^'.$uriPattern.'$~', $this->uri)) {
                $internalRoute = preg_replace("~^$uriPattern$~", $patch, $this->uri);

                // Define controller, action, parameters
                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments).'Controller';

                $actionName = ucfirst(array_shift($segments).'Action');

                $parameters = $segments;

               // Make up the controller namespace for class autoload
                $path = 'app\controllers\\'.ucfirst($controllerName);

                // Check class existence
                if (class_exists($path)) {


                    // Check method existence in class
                    if (method_exists($path, $actionName)) {

                        // Create instance of controller
                        $controller = new $path($actionName);

                        // Call a method of controller
                        $controller->$actionName($parameters); 

                        return true;

                    } else {
                        debug('no method:'.$action);
                        View::errorCode(404);
                    }
                } else {
                    debug('no controller:'.$path);
                    View::errorCode(404);
                }
            }
        }
    }

    /**
     * Run router
     */
    public function run() {

        // Checking url and address list matches
        if(self::match()) {

        } else {

            // If there is no match
            View::errorCode(404);
        }
    }
}














