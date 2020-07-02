<?php

require_once __DIR__ . '/Config.class.php';

Config::$databaseHost = 'localhost';
Config::$databaseName = 'crud_product';
Config::$databaseUser = 'root';
Config::$databasePass = '';

$conn = new mysqli(Config::$databaseHost, Config::$databaseUser, Config::$databasePass, Config::$databaseName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/**
 * Class Database
 */
class Database
{
    public static function Connect() {
        static $instance;
        if ($instance === null) {
            $opt = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => FALSE,
            );
            $dsn = 'mysql:host=' . Config::$databaseHost . ';dbname=' . Config::$databaseName;
            $instance = new PDO($dsn, Config::$databaseUser, Config::$databasePass, $opt);
        }
        return $instance;
    }
}