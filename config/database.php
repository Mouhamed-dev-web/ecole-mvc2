<?php

class Database
{
    private string $host = "localhost";
    private string $dbname = "ecolemvs2";
    private string $username = "root";
    private string $password = "";

    public function getConnection(): PDO
    {
        try {

            $pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4",
                $this->username,
                $this->password
            );

            // Afficher les erreurs PDO
            $pdo->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            // Retourner les résultats sous forme de tableau associatif
            $pdo->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );

            return $pdo;

        } catch (PDOException $e) {

            die("Erreur de connexion : " . $e->getMessage());
        }
    }
}
?>