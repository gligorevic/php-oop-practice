<?php

namespace app\models;

use app\models\Food;
use app\models\SideDish;

class Meal {
    private Food $food;
    private array $sideDishes = [];

    function __construct(Food $food) {
        $this->food = $food;
    }

    public function addSideDish(SideDish $sideDish) {
        $this->sideDishes[] = $sideDish;
    }

    public function calculatePrice() : float {
        $price = $this->food->getPrice();
        foreach($this->sideDishes as $sideDish) {
            $price += $sideDish->getPrice();
        }

        return $price;
    }

    public function getFood() {
        return $this->food;
    }

    public function getSideDishes() {
        return $this->sideDishes;
    }
}