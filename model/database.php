<?php
class Database {
    private static $dsn = 'mysql:host=eyw6324oty5fsovx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=thftvh7iuvai1xws';
    private static $username = 'brtyxfi14gjqvpmp';
    private static $password = 'jozeq9qvauzkewri';
    private static $db;

    private function __construct() {}

    public static function getDB() {
        if (!isset(self::$db)){
            try
            {
                self::$db = new PDO(self::$dsn,self::$username,self::$password);
            } catch (PDOException $e)
            {
                $error = "Database error: ";
                $error = $e -> getMessage();
                include('view/error.php');
                exit();
            }
        }
        return self::$db;
    }
}
?>