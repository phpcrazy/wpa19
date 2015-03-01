<?php 

// Loosely typed variable

$num = 45;

// How to print output number
// it is greater than 30
// to check odd or even
// to check positive or negative

echo $num;
if ($num % 2 == 0) {
  print "It's even";
} else {
	print "It's odd";
}

echo "<br />";

$name = "This is my hometown. I live in Yangon";

echo strlen($name);
echo "<br />";
echo substr_count($name, 'i');
echo "<br />";
var_dump(explode('.', $name));
echo strrev($name);
$pos = strrpos($name, 'i');
echo "<br />";
echo $pos;
// How to count character in string *
// how to count specific character 
// how to split with .
// how to reverse string
// " " is in position

 
// Fully Object-oriented Programming

?>