<?php
class Product {
    public $id, $name, $description, $price, $stock, $image;
    public function __construct($id, $name, $desc, $price, $stock, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $desc;
        $this->price = $price;
        $this->stock = $stock;
        $this->image = $image;
    }
}
