<?php

class Animal
{
    public $ten;
    public $mausac;

    public function __construct($ten, $mausac)
    {
        $this->ten = $ten;
        $this->mausac = $mausac;
    }

    public function tiengKeu()
    {
        echo "$this->ten đang kêu";
    }
}

class Dog extends Animal
{
    //Tính đa hình
    public function tiengKeu()
    {
        echo "$this->ten đang kêu gâu gâu ...";
        echo "<br />";
    }
}

class Cat extends Animal
{
    public function tiengKeu()
    {
        echo "$this->ten đang kêu meo meo ...";
        echo "<br />";
    }
}

//Tạo đối tượng
$dog = new Dog("Cậu Vàng", "Vàng");
$cat = new Cat("Meo Tom", "Xám");

$dog->tiengKeu();
$cat->tiengKeu();
