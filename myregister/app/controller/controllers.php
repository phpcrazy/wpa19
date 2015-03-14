<?php 

function _homeController() {
	$data = array(
		'title'	=> config_load('app.title'),
		'name'	=> 'How are you'	
	);
	load_view('home', $data);
}

function _blogController() {
	$data = array(
		'title'	=> config_load('app.foo.bar'),
		'name'	=> 'How do you do?'
		);
	load_view('blog', $data);
}

function _pageController() {
	$data = array(
		'title'	=> 'Page'
		);
	load_view('register', $data);
}

function _thihaController() {
	$data = array(
		'title'	=> 'Soe Thiha Naung'
		);
	load_view('thiha', $data);
}


 ?>