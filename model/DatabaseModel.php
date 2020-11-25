<?php
class DatabaseModel {

    const DB_HOST = "localhost";
    const DB_USER = "root";
    const DB_PASS = "Julia110805";
    const DB_BASE = "fc";
    private $transacao;

    private static $instance;
    private function __construct() { }

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = mysqli_connect(self::DB_HOST, self::DB_USER, self::DB_PASS, self::DB_BASE);
            mysqli_query(self::$instance,"SET NAMES 'UTF8'");
            mysqli_query(self::$instance,"SET character_set_connection=utf8");
            mysqli_query(self::$instance,"SET character_set_client=utf8");
            mysqli_query(self::$instance,"SET character_set_results=utf8");            
        }
        return self::$instance;
    }
    
}
?>