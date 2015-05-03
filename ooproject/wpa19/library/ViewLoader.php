<?php
/**
 * Created by PhpStorm.
 * User: soethiha
 * Date: 5/3/15
 * Time: 6:35 PM
 */

class View {
    public static function load($page, $data = null) {
        $file = DD . "/app/view/" . $page . ".php";
        if(file_exists($file)) {
            ob_start();
            if($data != null) {
                extract($data);
            }
            require $file;
            return ob_get_clean();
        } else {
            echo "404!";
        }
    }
}