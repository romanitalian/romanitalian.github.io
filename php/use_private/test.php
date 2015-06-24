<?php

class MyClass
{
    private function privateMethod($args) {
        return $args;
    }
}

function callPrivateMethod($object, $method, $args) {
    $classReflection = new \ReflectionClass(get_class($object));
    $methodReflection = $classReflection->getMethod($method);
    $methodReflection->setAccessible(true);
    $result = $methodReflection->invokeArgs($object, $args);
    $methodReflection->setAccessible(false);
    return $result;
}

$myObject = new MyClass();
echo callPrivateMethod($myObject, 'privateMethod', ['world']);
