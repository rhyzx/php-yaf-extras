<?php

namespace Yaf\Extras;

// RESTful Route API Wrapper
class RestfulRegister {
    private $router;
    private $index = 0;
    private $prefix = '__REST_';
    public function __construct(/*\Yaf\Router*/ $router) {
        $this->router = $router;
    }

    public function get($path, $controller, $action) {
        $this->on('get', $path, $controller, $action);
    }

    public function post($path, $controller, $action) {
        $this->on('post', $path, $controller, $action);
    }

    public function put($path, $controller, $action) {
        $this->on('put', $path, $controller, $action);
    }

    public function delete($path, $controller, $action) {
        $this->on('delete', $path, $controller, $action);
    }

    public function patch($path, $controller, $action) {
        $this->on('patch', $path, $controller, $action);
    }

    // TODO other methods like options?


    // all methods
    public function all($path, $controller, $action) {
        $this->register($path, $controller, $action);
    }

    // low level api
    public function on($method = null, $path, $controller, $action) {
        $this->router->addRoute( $this->prefix . $this->index++,
            new RestfulRoute($path, array('controller' => $controller, 'action' => $action, 'method' => $method))
        );
    }
}