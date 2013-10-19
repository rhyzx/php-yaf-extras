<?php

namespace Yaf\Extras;

// RESTful Route API Wrapper
class RestfulRegister {
    private $router;
    private $index = 0;
    private $prefix = '__REST_';
    public function __construct($router) {
        $this->router = $router;
    }

    public function get($path, $controller, $action) {
        $this->register($path, $controller, $action, 'get');
    }

    public function post($path, $controller, $action) {
        $this->register($path, $controller, $action, 'post');
    }

    public function put($path, $controller, $action) {
        $this->register($path, $controller, $action, 'put');
    }

    public function delete($path, $controller, $action) {
        $this->register($path, $controller, $action, 'delete');
    }

    public function patch($path, $controller, $action) {
        $this->register($path, $controller, $action, 'patch');
    }

    // TODO other methods like options?


    // all methods
    public function all($path, $controller, $action) {
        $this->register($path, $controller, $action);
    }


    // low level api
    public function register($path, $controller, $action, $method = null) {
        $this->router->addRoute( $this->prefix . $this->index++,
            new RestfulRoute($path, array('controller' => $controller, 'action' => $action, 'method' => $method))
        );
    }
}