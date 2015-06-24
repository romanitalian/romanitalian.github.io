<?php

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

var_dump($foo->bar()); // 'I am private'


