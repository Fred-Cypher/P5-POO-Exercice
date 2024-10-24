<?php


class DBConnect
{
    private static $instance = null;
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=' . $_ENV["DB_HOST"] .';dbname=' . $_ENV["DB_NAME"], "DB_USER", "DB_PASSWORD");
    }

    public static function getInstance(): DBConnect
    {
        if (self::$instance == null) {
            self::$instance = new DBConnect();
        }
        return self::$instance;
    }

    public function getPDO()
    {
        return $this->pdo;
    }
} 
