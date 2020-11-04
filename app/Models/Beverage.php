<?php

namespace app\models;

use app\models\Product;

abstract class Beverage extends Product {
    private int $volume;

    protected function __construct($name, $volume) {
        parent::__construct($name, $this->createPrice());
        $this->volume = $volume;
    }

    public function getVolume() : int {
        return $this->volume;
    }

    function createPrice() {
        return rand(150,500);
    }
}