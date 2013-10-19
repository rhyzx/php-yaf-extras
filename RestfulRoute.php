<?php

namespace Yaf\Extras;

// RESTful Route
// implementation by Compositing on RewriteRouter
class RestfulRoute implements \Yaf\Route_Interface {
    private $route;
    private $method;

    public function __construct($path, $options/*, $isRegex = false*/) {
        if ( isset($options['method']) ) {
            $this->method = $options['method'];
        }
        $this->route = new \Yaf\Route\Rewrite($path, $options);
    }

    public function route(/*\Yaf\Request_Abstract*/ $request) {
        // HTTP method adapt
        if ( isset($this->method) ) {
            $method = strtolower( $request->getMethod() );

            // fallback method
            if ( $method === 'post' && isset($_POST['_method'])) {
                $method = strtolower( $_POST['_method'] );
            }

            if ( $method !== strtolower($this->method) ) {
                return false;
            }
        }
        return $this->route->route($request);
    }
}