<?php

class DatabaseConnection {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli('localhost', 'root', '', 'gestion_finance');
        if ($this->conn->connect_error) {
            die("Erreur de connexion à la base de données : " . $this->conn->connect_error);
        }
    }

    public function exeute($query) {
        $result = $this->conn->query($query);
        if (!$result) {
            die("Erreur d'exécution de la requête : " . $this->conn->error);
        }
        return $result;
    }

    public function __destruct() {
        $this->conn->close();
    }
}
?>