<?php

namespace app\models;

use app\models\Meal;
use app\models\Beverage;

class Order {
    private int $tableNumber;
    private array $products;

    function __construct(int $tableNumber) {
        $this->tableNumber = $tableNumber;
    }

    public function addBeverage(Beverage $product) {
        $this->products[] = $product;
    }

    public function addMeal(Meal $meal) {
        $this->products[] = $meal->getFood();
        $this->products = array_merge($this->products, $meal->getSideDishes());
    }

    public function getProducts() : array {
        return $this->products;
    }
}