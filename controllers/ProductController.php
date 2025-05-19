<?php
require_once __DIR__ . '/../dao/ProductDAO.php';

class ProductController {
    public static function getAll() {
        return ProductDAO::getAll();
    }
}
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../views/login.php?error=connect_required");
    exit;
}

// si l'utilisateur est connecté :
echo "Achat effectué avec succès !";

