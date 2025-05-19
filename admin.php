<?php
session_start();
require_once __DIR__ . '/../dao/ProductDAO.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        ProductDAO::add($_POST['name'], $_POST['description'], $_POST['price'], $_POST['stock']);
    } elseif (isset($_POST['delete'])) {
        ProductDAO::delete($_POST['product_id']);
    }
}

$products = ProductDAO::getAll();
?>
<h2>Interface Admin</h2>
<a href="../index.php">Retour</a><br><br>
<h3>Ajouter un produit</h3>
<form method="post">
    Nom: <input type="text" name="name" required><br>
    Description: <input type="text" name="description" required><br>
    Prix: <input type="number" name="price" step="0.01" required><br>
    Stock: <input type="number" name="stock" required><br>
    <button type="submit" name="add">Ajouter</button>
</form>

<h3>Liste des produits</h3>
<ul>
    <?php foreach ($products as $product): ?>
        <li>
            <?= htmlspecialchars($product->name) ?> (<?= $product->stock ?> en stock - <?= $product->price ?>€)
            <form method="post" style="display:inline">
                <input type="hidden" name="product_id" value="<?= $product->id ?>">
                <button type="submit" name="delete">Supprimer</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>ajouter des formulaires pour ajouter/modifier/supprimer -->