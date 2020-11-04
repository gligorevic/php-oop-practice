<?php

namespace app\models;

use app\models\Meal;
use app\models\Beverage;

class Order {
    private int $id;
    private int $tableNumber;
    private array $products = [];

    function __construct(int $id, int $tableNumber) {
        $this->id = $id;
        $this->tableNumber = $tableNumber;
    }

    public function addBeverage(Beverage $product) {
        $this->products[] = $product;
    }

    public function addMeal(Meal $meal) {
        $this->products[] = $meal->getFood();
        $this->products = array_merge($this->products, $meal->getSideDishes());
    }

    public function addFood(Food $food) {
        $this->products[] = $food;
    }

    public function getProducts() : array {
        return $this->products;
    }

    public function getId() : int {
        return $this->id;
    }

    public function getTableNumber() : int {
        return $this->tableNumber;
    }
}