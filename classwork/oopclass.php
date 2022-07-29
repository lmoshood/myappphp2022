<?php
class Person{
    public $name = 'Johnson';
    public $age = '23';
    public $height = '6ft';

    function eat(){
        echo "Eating .....";
    }

    function walk(){
        echo "walkng .....";
    }

    function sleep(){
        echo "sleeping .....";
    }

}

class Student extends Person{

    public $name = 'James';
    public $age = '12';
    public $height = '4.5ft';
    function __construct(){
        echo 'Welcome to our app';
    }

}
$jack = new Student();
//$jack->walk();

?>