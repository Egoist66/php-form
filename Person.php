<?php

namespace person;

class Person {
    public $name;


    public function __construct(string $name)
    {
        $this->name = $name;
    }
}


namespace a;

class Person {
    public $age;


    public function __construct(string $age)
    {
        $this->age = $age;
    }
}
