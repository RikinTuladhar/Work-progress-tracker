<?php
class Database {
    private static $host = "localhost"; 
    private static $user = "root";
    private static $pass = "";
    private static $db = "workprogresstracker";
    private $con = null;
    public function __construct() {
        $this->con = mysqli_connect(self::$host,self::$user, 
            self::$pass, self::$db);
    }
    public function getConnection() {
        if ($this->con != null) {
            return $this->con;
        }
    }
}