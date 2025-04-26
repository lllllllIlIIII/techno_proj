<?php
require_once 'controllers/AuthController.php';
require_once 'controllers/ProductController.php';

if (!AuthController::isAdmin()) {
    header('Location: login.php');
    exit;
}

$products = ProductController::getAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Produits</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h1>Panel Admin</h1>
    <a href="logout.php" class="btn btn-danger mb-3">Déconnexion</a>
    <h3>Liste des produits</h3>
    <ul class="list-group">
        <?php foreach ($products as $p): ?>
        <li class="list-group-item">
            <?= $p->name ?> - <?= $p->price ?> €
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
