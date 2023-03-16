<?php

class Db {

     // The database connection
     protected static $_instance = null;

    protected $_conn = null;

    protected function __construct() {
    }

    public static function getInstance()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function getConnection() {
        if (is_null($this->_conn)) {
            $config = parse_ini_file('config.ini');
            $this->_conn = new mysqli($config['DB_HOST'],$config['DB_USERNAME'],$config['DB_PASSWORD'],$config['DB_DATABASE']);
        }
        if($this->_conn === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            return false;
        }
        return $this->_conn;
    }
 
    public function query($query) {
        // Connect to the database
        $connection = $this -> getConnection();
 
        // Query the database
        $result = $connection -> query($query);
 
        return $result;
    }

    public function select($query) {
        $rows = array();
        $result = $this -> query($query);
        if($result === false) {
            return false;
        }
        while ($row = $result -> fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
    
    public function error() {
        $connection = $this -> getConnection();
        return $connection -> error;
    }
    
    public function quote($value) {
        $connection = $this -> getConnection();
        return "'" . $connection -> real_escape_string($value) . "'";
    }
}
