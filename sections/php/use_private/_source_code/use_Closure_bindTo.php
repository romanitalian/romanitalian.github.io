<?php

class MyClass
{
    private function privateMethod($args) {
        return $args;
    }

    function callPrivate($object, $method, $args) {
        $caller = function ($method, $args) {
            return call_user_func_array([$this, $method], $args);
        };
        $caller->bindTo($object, $object);
        return $caller($method, $args);
    }
}

$privacyViolator = new MyClass();
$t = $privacyViolator->callPrivate(new stdClass(), 'privateMethod', ['world use_Closure_bindTo']);
var_dump($t);
