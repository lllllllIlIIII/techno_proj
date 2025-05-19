<?php
require_once __DIR__ . '/../controllers/ProductController.php';
$products = ProductController::getAll();
?>
<div class="row" id="product-list">
    <?php foreach ($products as $p): ?>
    <div class="col-md-4 mb-3">
        <div class="card">
            <img src="<?= $p->image ?>" class="card-img-top">
            <div class="card-body">
                <h5><?= $p->name ?></h5>
                <p><?= $p->description ?></p>
                <strong><?= $p->price ?> €</strong>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
