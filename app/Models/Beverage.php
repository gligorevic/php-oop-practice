<?php

namespace app\models;

use app\models\Product;

abstract class Beverage extends Product {
    private int $volume;
}