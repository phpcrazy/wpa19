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

        $data = array(
            'title' => $config_value
        );

        echo View::load('home', $data);
    }
}