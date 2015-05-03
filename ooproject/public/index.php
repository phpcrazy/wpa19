<?php 

define("DD" , realpath(dirname(__FILE__) . "/.."));


require DD . "/vendor/autoload.php";

$config_value = Config::get('app.app_title');

$data = array(
    'title' => $config_value
);

echo View::load('home', $data);
?>