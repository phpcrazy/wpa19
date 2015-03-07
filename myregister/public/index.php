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

include "../wpa19/functions.php";


if(empty($_GET['page'])) {
	$page = 'home';
} else {
	$page = $_GET['page'];
}

$data = array(
	'title'	=> "Myanmar Links",
	'name'	=> 'How are you'	
	);
load_view($page, $data);

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