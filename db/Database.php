<?php
/*
    @author Leo Arcos
*/
class Database {

    private $_connection;
    private static $_instance; //The single instance
    private $_host = "localhost";
    private $_username = "root";
    private $_password = "";
    private $_database = "gimmidsc_gimmids_irc";
    public $key='a89b91c03d5cd0ac47d408d5dda4a41f932d27767e3d13d3f5e84a12351fc535';

    
    public static function getInstance() {
        if (!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    // Constructor
    public function __construct() {
        try {
            $this->__connection = new PDO("mysql: host=".$this->_host.";dbname=".$this->_database."", $this->_username, $this->_password );
             
            //code...
        } catch (PDOException $errr) {
            //throw $th;
            echo $error->getMessage();
        }
        
        
    }

    // Magic method clone is empty to prevent duplication of connection
    private function __clone() {
        
    }

    // Get mysqli connection
    public function getConnection() {
        return $this->_connection;
    }
 

}