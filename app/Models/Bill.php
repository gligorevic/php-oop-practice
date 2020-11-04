<?php

namespace app\models;

use app\models\Meal;
use app\models\Beverage;

class Bill {
    private Order $order;
    private float $finalPrice;

    function __construct(Order $order) {
        $this->order = $order;
        $this->finalPrice = $this->calculateFinalPrice();
    }

    private function calculateFinalPrice() : float {
        $price = 0;
        foreach($this->order->getProducts() as $product) {
            $price += $product->getPrice();
        }
        return $price;
    }

    public function getFinalPrice() {
        return $this->finalPrice;
    }

    public function getOrder() {
        return $this->order;
    }

    public function getTableNumber() {
        return $this->order->getTableNumber();
    }
}