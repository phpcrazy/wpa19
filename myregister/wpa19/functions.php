<?php 

function load_view($page, $data = null) {
	$file = DD . "/app/view/" . $page . ".php";
	if(file_exists($file)) {
		ob_start();
		if($data != null) {
			extract($data);	
		}
		require $file;
		ob_end_flush();
	} else {
		echo "404!";
	}
}

function config_load($data) {
	$value = explode('.', $data);
	
	$file = DD . "/app/config/" . $value[0] . ".php";
	if(file_exists($file)) {
		$data = require $file;
		return $data[$value[1]];
	} else {
		trigger_error($value[0] . ' file not found in Config Folder', E_USER_ERROR);
	}
}

function dump($data, $die = false) {
	var_dump($data);
	if($die == true) {
		die();
	}
}

?>