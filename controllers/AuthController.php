<?php
require_once __DIR__ . '/../dao/UserDAO.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $user = UserDAO::getByEmail($email);

    if ($user && password_verify($password, $user->password)) {
        $_SESSION['user'] = [
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'role' => $user->getRole(),
            'name' => $user->getName()
        ];

        if ($user->getRole() === 'admin') {
            header('Location: ../admin/dashboard.php');
        } else {
            header('Location: ../index.php');
        }
        exit;
    } else {
        $_SESSION['error'] = "Identifiants invalides.";
        header('Location: ../login.php');
        exit;
    }
}

