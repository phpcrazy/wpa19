<?php
/**
 * Created by PhpStorm.
 * User: soethiha
 * Date: 5/16/15
 * Time: 5:42 PM
 */

// Singleton Pattern

class DB {

    private static $_instance = null;

    private function __construct() {

    }

    public static function table($table_name) {
        if(!(self::$_instance instanceof DB)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function __destruct() {

    }


}