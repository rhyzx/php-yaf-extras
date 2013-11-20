# Yaf Extras


## Installation

Install via Composer

```sh
> composer require "yaf/extras:*"
```


----

### Class: RESTfulRouter

**RESTful** router, provide a quick way to register **RewriteRouter** on YAF with **HTTP method** adaptation(RESTful).


##### new RESTfulRouter()

Create a router.


##### $router->on($method, $url, $controller, $action)

- $method **String**: HTTP method name, wildcard `*` supported.
- $url **String**
- $controller **String**: controller class name
- $action **String**: method name of controller

**Tips**. you can register multi methods in single `on()`, use space to separate methods, eg. `$router->on('get post', 'user/:id', 'user', 'show')`


##### Example
```php
class Bootstrap extends \Yaf\Bootstrap_Abstract {
    // default YAF style route registration
    function _initRoute(\Yaf\Dispatcher $dispatcher) {
        $router = $dispatcher->getRouter();
        
        // default yaf rewrite route
        $router->addRoute('dog', new \Yaf\Route\Rewrite('dog/:id', array('controller' => 'dog', 'action' => 'read')));
        $router->addRoute('dogadd', new \Yaf\Route\Rewrite('dog', array('controller' => 'dog', 'action' => 'create')));
        $router->addRoute('dogdel', new \Yaf\Route\Rewrite('dog/:id/delete', array('controller' => 'dog', 'action' => 'delete')));


    }
    
    // RESTful style
    function _initRESTfulRoute() {
        $router = new \Yaf\Extras\RESTfulRouter();
        $router.on('post', 'cat', 'cat', 'create');
        $router.on('get', 'cat/:id', 'cat', 'read');
        $router.on('delete', 'cat/:id', 'cat', 'delete');
        $router.on('get post', 'dog/:id', 'dog', 'yeah');
    }

}
```