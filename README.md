# Yaf Extras


## Installation

Install via Composer

```sh
composer require "yaf/extras:*"
```


----

### Class: RestfulRoute


##### Example
```php
class Bootstrap extends \Yaf\Bootstrap_Abstract {
    function _initRoute(\Yaf\Dispatcher $dispatcher) {
        $router = $dispatcher->getRouter();
        
        // default yaf rewrite route
        $router->addRoute('dog', new \Yaf\Route\Rewrite('dog/:id', array('controller' => 'dog', 'action' => 'read')));
        $router->addRoute('dogadd', new \Yaf\Route\Rewrite('dog', array('controller' => 'dog', 'action' => 'create')));

        // restful route
        $router->addRoute('cat', new \Yaf\Extras\RestfulRoute('cat/:id', array('controller' => 'cat', 'action' => 'read', method => 'get')));
        $router->addRoute('catadd', new \Yaf\Extras\RestfulRoute('cat', array('controller' => 'cat', 'action' => 'create', method => 'post')));
    }
}
```

----

### Class: RestfulRegister

Convience API Wrapper for `RestfulRoute`


##### new RestfulRegister($router)

- $router **\Yaf\Router**

Create a register on yaf `router`


##### register.get($url, $controller, $action), register.post($url, $controller, $action), etc...

- $url **String**
- $controller **String**: controller class name
- $action **String**: method name of controller


##### register.register($url, $controller, $action, $method)

- $url **String**
- $controller **String**: controller class name
- $action **String**: method name of controller
- $method **String**: HTTP method name

Low level api


##### Example
```php
class Bootstrap extends \Yaf\Bootstrap_Abstract {
    function _initRoute(\Yaf\Dispatcher $dispatcher) {
        $reg = new \Yaf\Extras\RestfulRegister($dispatcher->getRouter());

        $reg.post('cat', 'cat', 'create');
        $reg.get('cat/:id', 'cat', 'read');
        $reg.delete('cat/:id', 'cat', 'delete');
    }
}
```