<?php 

class Config {
	public static function get($data) {
		$value = explode('.', $data);
		
		$file = DD . "/app/config/" . $value[0] . ".php";
		if(file_exists($file)) {
			$data = require $file;
			return $data[$value[1]];
		} else {
			trigger_error($value[0] . ' file not found in Config Folder', E_USER_ERROR);
		}

	}
}

?>