// === FILE: controllers/panier_ajax.php ===
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $id = $_POST['product_id'];

    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    // On ajoute ou on incrémente
    if (isset($_SESSION['panier'][$id])) {
        $_SESSION['panier'][$id]++;
    } else {
        $_SESSION['panier'][$id] = 1;
    }

    echo json_encode(['status' => 'ok', 'message' => 'Ajouté au panier']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Requête invalide']);
}
