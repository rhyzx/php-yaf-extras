<?php

namespace Yaf\Extras\lib;

// RESTful Route
// implementation by Compositing on RewriteRouter
class RESTfulRoute implements \Yaf\Route_Interface {
    private $route;
    private $method = '*'; // default any

    public function __construct($path, $options/*, $isRegex = false*/) {
        if ( is_string($options['method']) ) {
            $this->method = strtolower( $options['method'] );
        }
        $this->route = new \Yaf\Route\Rewrite($path, $options);
    }

    public function route(/*\Yaf\Request_Abstract*/ $request) {
        // HTTP method adapt
        if ( $this->method !== '*' ) {
            $method = strtolower( $request->getMethod() );

            // fallback method
            if ( $method === 'post' && isset($_POST['_method'])) {
                $method = strtolower( $_POST['_method'] );
            }

            if ( $method !== $this->method ) {
                return false;
            }
        }

        // url adapt
        return $this->route->route($request);
    }
}