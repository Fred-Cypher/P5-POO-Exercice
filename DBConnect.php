<?php

// Inclut le fichier avec les constantes pour la connexion
require 'config.php';

class DBConnect
{
    private static $instance = null;
    private $pdo;

    public function __construct()
    {
        try {
            // Initialise PDO avec les constantes
            $this->pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Message de succès pour la connexion
            echo "Connexion réussie à la base de données. \n";
        } catch (PDOException $e) {
            // Affiche une erreur en cas de problème de connexion
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }

    public static function getInstance(): DBConnect
    {
        if (self::$instance == null) {
            self::$instance = new DBConnect();
        }

        return self::$instance;
    }

    public function getPDO(): PDO
    {
        return $this->pdo;
    }
}
