<?php

require_once __DIR__ . '/App.php';

class Database {
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $host = APP::Env('DB_HOST');
        $port = APP::Env('DB_PORT');
        $database = APP::Env('DB_DATABASE');
        $username = APP::Env('DB_USERNAME');
        $password = APP::Env('DB_PASSWORD');

        try {
            // Connection string for Microsoft SQL Server
            $connectionString = "sqlsrv:Server=$host,$port;Database=$database";
            $this->connection = new PDO($connectionString, $username, $password);
            
            // Set PDO to throw exceptions on errors
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Handle connection errors
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance(): Database
    {
        if (self::$instance == null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public static function getConnection(): PDO
    {
        return self::getInstance()->connection;
    }

    public static function beginTransaction() {
        self::getConnection()->beginTransaction();
    }

    public static function commit() {
        self::getConnection()->commit();
    }

    public static function rollBack() {
        self::getConnection()->rollBack();
    }
}
