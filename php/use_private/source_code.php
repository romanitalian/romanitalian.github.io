<?php

// (PHP 5 >= 5.4.0)

trait DynamicDefinition
{

    public function __call($name, $args) {
        if(is_callable($this->$name)) {
            return call_user_func($this->$name, $args);
        } else {
            throw new \RuntimeException("Method {$name} does not exist");
        }
    }

    public function __set($name, $value) {
        $this->$name = is_callable($value) ?
            $value->bindTo($this, $this) :
            $value;
    }
}

class Foo
{
    use DynamicDefinition;
    private $privateValue = 'I am private';
}

$foo = new Foo;
$foo->bar = function () {
    return $this->privateValue;
};

// prints 'I am private'
print $foo->bar();


function callPrivateMethod($object, $method, $args) {
    $classReflection = new \ReflectionClass(get_class($myClass));
    $methodReflection = $classReflection->getMethod($method);
    $methodReflection->setAccessible(true);
    $result = $methodReflection->invokeArgs($object, $args);
    $methodReflection->setAccessible(false);
}

$myObject = new MyClass();
callPrivateMethod($myObject, 'hello', ['world']);


class Foo
{
    private $secretProperty = "Hello";

    private function secretMethod() {
        return 'World';
    }
}

$privatePropertyAccessor = function ($prop) { return $this->$prop; };

$privateMethodAccessor = function ($method) {
    return [$this, $method](); };

$foo = new Foo();

echo $privatePropertyAccessor->call($foo, 'secretProperty'); // Hello
echo $privateMethodAccessor->call($foo, 'secretMethod'); // World