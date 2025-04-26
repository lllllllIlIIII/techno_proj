<?php
require_once __DIR__ . '/../dao/ProductDAO.php';

class ProductController {
    public static function getAll() {
        return ProductDAO::getAll();
    }
}
