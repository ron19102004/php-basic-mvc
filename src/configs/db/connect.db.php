<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/env.util.php");

class Database
{
    private static $conn;

    public static function connect()
    {
        Database::$conn = null;
        try {
            $dbEnv = Env::get("database");
            Database::$conn = new PDO('mysql:host=' . $dbEnv['host'] . ';dbname=' . $dbEnv['dbName'], $dbEnv['user'], $dbEnv['password']);
            Database::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Lỗi kết nối: ' . $e->getMessage();
        }
        return Database::$conn;
    }
    public static function close()
    {
        if (Database::$conn != null) Database::$conn = null;
    }
}
