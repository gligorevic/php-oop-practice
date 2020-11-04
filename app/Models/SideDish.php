<?php

namespace app\models;

use app\models\Product;

class SideDish extends Product {
    function __construct($name) {
        parent::__construct($name, $this->createPrice());
    }

    function createPrice() {
        return rand(20,100);
    }
}