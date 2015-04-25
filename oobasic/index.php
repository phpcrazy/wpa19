<?php 

// Automatic Reference Counting
// Garbage Collector

// php script --compile--> OP Code --Translate--> Output

class Dog {
	// properties
	public $name;
	public $color = "red";
	private $leg; 
	const TEST = "Hello World!";
	public static $foo;

	private $data = array();

	public function __construct($name, $color, $leg = 4) {
		$this->name = $name;
		$this->color = $color;
		$this->leg = $leg;
	}

	public static function warning() {
		echo self::TEST;
		echo "Dog Bite!";
	}

	// methods
	public function bark() {
		echo "Bark!";
	}

	public function __destruct() {
		// echo "Class Destroyed!";
	}

	public function getLeg() {
		return $this->leg;
	}

	public function __set($name, $value) {
		$this->data[$name] = $value;
	}

	public function __get($key) {
		return $this->data[$key];
	}

	public function __call($name, $arguments) {
		var_dump($name);
		var_dump($arguments);
	}

	public static function __callStatic($name, $arguments) {
		var_dump($name);
		var_dump($arguments);	
	}
}

Dog::doordie("Instant");

$dog = new Dog("Aung Net", "red");

// Late binding
// Lazy Loading

$dog->moo = "BOO";
$dog->goo = "GOO!";

echo $dog->moo;

$dog->dance("PhinLaneKwin", "2");

// Singaleton!





// Dog::warning();
// Dog::bark();
// echo Dog::TEST; 
// Dog::$foo = "bar";
// echo Dog::$foo;

// $dog = new Dog("Aung Net");

// echo $dog->color;
// echo $dog->name;
// echo $dog->getLeg();
// echo "<br />";
// $dog->bark();
// echo "<br />";
// $dog->warning();

 ?>