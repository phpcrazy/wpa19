<?php 
/*
Single Entrance
Protect Directory Browsing
Layering 
	- Front-end,
	- Appliation,
	- Infra-structure,
	- Third-Party,
	- Bootstrapping
- Single Responsibility (or) Least Responsibility

http://localhost/wpa19/myregister/public/index.php
http://localhost/wpa19/myregister/public/index.php?page=register
http://localhost/wpa19/myregister/public/index.php?page=blog
http://localhost/wpa19/myregister/public/index.php?page=blabla
*/


define("DD", '..');

include DD . "/wpa19/functions.php";

$servername = config_load('database.hostname');
$dbname = config_load('database.dbname');
$username = config_load('database.username');
$password = config_load('database.password');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(255),
email VARCHAR(255),
username VARCHAR(255),
password VARCHAR(255)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Users created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);


die();

include DD . "/app/controller/controllers.php";

if(empty($_GET['page'])) {
	$page = 'home';
} else {
	$page = htmlspecialchars($_GET['page']);
}

$routes = include DD . "/app/routes.php";

if(array_key_exists($page, $routes)) {
	call_user_func($routes[$page]);
} else {
	echo "404";
}


// if($page == 'home') {
// 	_homeController();
// } elseif($page == 'blog') {
// 	_blogController();
// } elseif($page == 'register') {
// 	_registerController();
// }

function load_ngapain_view($page) {
	switch ($page) {
	case 'home':
		include "../app/view/'. $page .'.php";
		break;
	case 'blog':
		include "../app/view/blog.php";
		break;
	case 'register':
		include "../app/view/register.php";
		break;	
	case 'test':
		include "../app/view/test.php";
		break;
	default:
		echo "404!";
		break;
	}
}



?>