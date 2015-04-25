<?php 


class Animal {
	public $name;

	public function bark() {
		echo "Bark";
	}


}

class Dog extends Animal {
	public function bark() {
		parent::bark();
		echo "Woof!";
	}
}

$dog = new Dog();
$dog->bark();
$dog->name = "Aung Net";
echo $dog->name;


 ?>