<?php
require_once __DIR__ . '/../assets/db/db_pg_connect.php';
require_once __DIR__ . '/../models/User.php';

class UserDAO {
    public static function getByEmail($email) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch();
        return $row ? new User($row['id'], $row['email'], $row['password'], $row['role'], $row['name']) : null;
    }

    public static function register($email, $password, $name = '', $role = 'client') {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)");
        return $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => $role
        ]);
    }
}
