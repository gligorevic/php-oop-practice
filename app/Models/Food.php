<?php

namespace app\models;

use app\models\Product;

abstract class Food extends Product {
    protected function __construct($name) {
        parent::__construct($name, $this->createPrice());
    }

    function createPrice() {
        return rand(300,600);
    }
}