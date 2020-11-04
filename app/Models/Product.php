<?php

namespace app\models;

abstract class Product {
    private string $name;
    private float $price;

    protected function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice() : float {
        return $this->price;
    }

    public function getName() : string {
        return $this->name;
    }

    protected abstract function createPrice();
}