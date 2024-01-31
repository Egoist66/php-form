<?php

declare(strict_types= 1);

class Base {
    public string $one = 'base message <br>';


    protected  function printInfo():void {
        echo $this->one;
    }
}

class BaseChild extends Base {
    
    public string $two;


    public function greet(): void {
        parent::printInfo();
        echo $this->two;
    }

    public function printInfo():void {
        parent::printInfo();
        echo 'Overrided';
    }
}

$obj = new BaseChild();
$obj->two = '2';
$obj->printInfo();
$obj->greet();

