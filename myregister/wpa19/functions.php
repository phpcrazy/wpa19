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

function getDataById($table_name, $id) {
	$conn = _connectDB();
	$sql = "SELECT * FROM " . $table_name 
		. " WHERE id =" . $id;
	$result = mysqli_query($conn, $sql);
	$return_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_close($conn);
	mysqli_free_result($result);
	return $return_result;	
}


function getAllData($table_name) {
	// Connect
	// SQL Execute
	// return Values
	// Connection Close
	$conn = _connectDB();
	$sql = "SELECT * FROM " . $table_name;
	$result = mysqli_query($conn, $sql);
	$return_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_close($conn);
	mysqli_free_result($result);
	return $return_result;
}


function _connectDB() {
	$servername = config_load("database.hostname");
	$username = config_load("database.username");
	$password = config_load("database.password");
	$dbname = config_load("database.dbname");

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	return $conn;
}

// sudo apt-get install php5-mysqlnd
// sudo service apache2 restart

?>