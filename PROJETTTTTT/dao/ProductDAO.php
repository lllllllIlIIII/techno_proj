<?php
require_once 'Database.php';
require_once __DIR__ . '/../models/Product.php';

class ProductDAO {
    public static function getAll() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM products");
        $products = [];
        while ($row = $stmt->fetch()) {
            $products[] = new Product(...array_values($row));
        }
        return $products;
    }

    public static function add($name, $desc, $price, $stock, $image) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT ajouter_produit(:name, :desc, :price, :stock, :image)");
        $stmt->execute(compact('name', 'desc', 'price', 'stock', 'image'));
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
