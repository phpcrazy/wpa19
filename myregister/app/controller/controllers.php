<?php 

function _homeController() {
	$customers = getAllData("users");

	$data = array(
		'title'	=> config_load('app.title'),
		'name'	=> 'How are you'	
	);
	load_view('home', $data);
}

function _blogController() {
	$result = getDataById('users', 0);

	dump($result, true);

// 	load_view('blog', $data);
}

// Varification
// Validation
function _registerController() {
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$userdata = [
			'name'		=> $_POST['name'],
			'email'		=> $_POST['email'],
			'username'	=> $_POST['username'],
			'password'	=> $_POST['password']
		];
		
		$rules = [
			'name'		=> 'required|min:4',
			'email'		=> 'required|email',
			'username'	=> 'required|min:4',
			'password'	=> 'required|min:4'
		];

		if(_validateData($userdata, $rules)) {
			$userdata = array(
				'name'		=> $_POST['name'],
				'email'		=> $_POST['email'],
				'username'	=> $_POST['username'],
				'password'	=> password_hash($_POST['password'], PASSWORD_DEFAULT)
				);	
			$result = insertData("users", $userdata);
			var_dump($result);
			
		} else {
			echo "Not validated!";
		}
	}
	load_view('register');
}

function _thihaController() {
	$data = array(
		'title'	=> 'Soe Thiha Naung'
		);
	$customer = [
		'name'	=> 'Soe Thiha Naung',
		'password'	=> 'wrwerwerwer'
	];

	insertData("customers", $customer);
	load_view('thiha', $data);
}


// Flash Message -> One-time used session

function _validateData($userdata, $rules) {
	$rules_name = $rules['name'];
	$data_name = $userdata['name'];
	$rules_name = explode('|', $rules_name);

	foreach ($rules_name as $key => $value) {

		if($value == 'required') {
			if(empty($data_name)) {

				return false;
			} else {
				return true;
			}
		} 
	}


}


 ?>