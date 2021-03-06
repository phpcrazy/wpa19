<?php
/**
 * Created by PhpStorm.
 * User: soethiha
 * Date: 5/9/15
 * Time: 6:04 PM
 */

class BlogController {

    public function view($id) {
        $config_value = Config::get('app.app_title');
        $users = DB::table("users")->where('id', $id)->get();

        $product = DB::table("products")->get();
        $data = array(
            'title' => $config_value,
            'users' => $users
        );

        echo View::load('home', $data);
    }

    public function index() {
        $config_value = Config::get('app.app_title');
        $users = DB::table("users")->get();

        $data = array(
            'title' => $config_value,
            'users' => $users
        );

        echo View::load('home', $data);
    }

    public function insert() {
        $data = array(
            'name'    => "Hla Hla",
            'email'   => "hlahla@gmail.com",
            'username'=> 'hlahla',
            'password'=> password_hash("12345", PASSWORD_DEFAULT)

        );

        $id = DB::table("users")->insert($data);
        var_dump($id);
    }
}