<?php 

function load_view($page, $data) {

	$file = "../app/view/" . $page . ".php";
	if(file_exists($file)) {
		ob_start();
		extract($data);
		require $file;
		ob_end_flush();
	} else {
		echo "404!";
	}

}

?>