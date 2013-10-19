# Yaf Extras


## Installation

Install via Composer

```sh
composer require "yaf/extras:*"
```



### RestfulRoute

`Bootstrap.php`
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


### RestfulRegister

Convience API Wrapper for `RestfulRoute`

```php
class Bootstrap extends \Yaf\Bootstrap_Abstract {
    function _initRoute(\Yaf\Dispatcher $dispatcher) {
        $reg = new \Yaf\Extras\RestfulRegister($dispatcher->getRouter());

        $reg.get('cat/:id', 'cat', 'read');
        $reg.post('cat', 'cat', 'create');
        $reg.delete('cat', 'cat', 'delete');
    }
}
```