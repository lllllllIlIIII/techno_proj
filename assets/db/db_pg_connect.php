<?php
class Database {
    public static function connect() {
        $dsn = "pgsql:host=localhost;dbname=gun;port=5432";
        $user = "postgres";
        $password = "samed";

        try {
            return new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
}
