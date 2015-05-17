<?php
/**
 * Created by PhpStorm.
 * User: soethiha
 * Date: 5/16/15
 * Time: 5:42 PM
 */

// Singleton Pattern

class DB extends PDO {

    private static $_instance = null;

    private $table_name;
    private $is_where = false;

    private $where_key;
    private $where_value;

    public function __construct() {
        $engine = Config::get('database.engine');
        $dbname = Config::get('database.dbname');
        $hostname = Config::get('database.hostname');
        $username = Config::get('database.username');
        $password = Config::get('database.password');
        $dsn = $engine . ':dbname=' . $dbname
            . ';host=' . $hostname;
        parent::__construct($dsn, $username, $password);
    }

    public static function table($table_name) {
        if(!(self::$_instance instanceof DB)) {
            self::$_instance = new DB();
        }
        self::$_instance->table_name = $table_name;
        return self::$_instance;
    }

    public function where($key, $value) {
        $this->is_where = true;
        $this->where_key = $key;
        $this->where_value = $value;
        return $this;
    }

    public function get() {
        if($this->is_where) {
            $sql = "SELECT * FROM "
                . $this->table_name
                . " WHERE " . $this->where_key . " = :"
                . $this->where_key;
        } else {
            $sql = "SELECT * FROM "
                . $this->table_name;
        }
        $tsmt = $this->prepare($sql);

        if($this->is_where) {
            $tsmt->execute([$this->where_key => $this->where_value]);
        } else {
            $tsmt->execute([]);
        }
        $this->is_where = false;
        $data = $tsmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

}