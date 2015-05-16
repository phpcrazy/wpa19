<?php 

define("DD" , realpath(dirname(__FILE__) . "/.."));


require DD . "/vendor/autoload.php";

// var_dump($GLOBALS);

DB::table('users');

DB::table("products");

DB::table("customers");

die();

$request_uri = $_SERVER['REQUEST_URI'];
$script_name = $_SERVER['SCRIPT_NAME'];

$request_uri = explode("/", $request_uri);
$script_name = explode("/", $script_name);

$path_info = array_diff($request_uri, $script_name);

$path_info = array_values($path_info);


$routes = include DD . '/app/routes.php';
if(array_key_exists($path_info[0], $routes)) {
    $controller = $routes[$path_info[0]];
    $controller = explode("@", $controller);
    array_shift($path_info);
    call_user_func_array(array(new $controller[0], $controller[1]), $path_info);
} else {
    echo "404";
}

?>