<?php 

function load_view($page) {
	$file = "../app/view/" . $page . ".php";
	if(file_exists($file)) {
		include $file;
	} else {
		echo "404!";
	}
}


 ?>