<?php
require_once __DIR__ . '/../dao/UserDAO.php';
session_start();

class AuthController {
    public static function login($email, $password) {
        $user = UserDAO::getByEmail($email);
        if ($user && password_verify($password, $user->password)) {
            $_SESSION['user'] = [
                'id' => $user->id,
                'email' => $user->email,
                'role' => $user->role
            ];
            return true;
        }
        return false;
    }

    public static function logout() {
        session_destroy();
    }

    public static function isAdmin() {
        return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin';
    }

    public static function isLogged() {
        return isset($_SESSION['user']);
    }
}
