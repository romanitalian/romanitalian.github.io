<?php

class PrivacyViolator
{
    public function callPrivateMethod($object, $method, array $args = array()) {
        if(!is_object($object)) {
            throw new \InvalidArgumentException('The $object param must be object');
        }
        $className = get_class($object);
        $method = new \ReflectionMethod($className, $method);
        $method->setAccessible(true);
        return $method->invokeArgs($object, $args);
    }
}

class MyClass
{
    private function hello($name) {
        return 'Hello '.$name;
    }
}

$myObject = new MyClass();
$privacyViolator = new PrivacyViolator();

$result = $privacyViolator->callPrivateMethod($myObject, 'hello', array('World'));

echo $result;
assert('Hello World' === $result);
