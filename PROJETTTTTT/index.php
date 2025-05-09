<?php
global $pdo;
require_once 'db.php'; // fichier contenant la connexion PDO
$products = $pdo->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gun shop</title>
    <meta name="description" content="Site fictif de vente d'armes pour projet scolaire">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link active" href="#">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Connexion</a></li>
        </ul>
    </div>
</nav>

<!-- Contenu principal -->
<main class="container mt-4">
    <h1 class="text-center mb-4">Bienvenue à Ammu-Nation</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php while ($product = $products->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="col">
                <div class="card h-100">
                    <img src="assets/<?= htmlspecialchars($product['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>
                        <p class="card-text text-muted">Stock : <?= htmlspecialchars($product['stock']) ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h5 text-primary">€<?= number_format($product['price'], 2, ',', ' ') ?></span>
                            <div>
                                <a href="#" class="btn btn-sm btn-outline-primary">Acheter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
