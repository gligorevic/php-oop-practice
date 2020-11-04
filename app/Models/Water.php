<?php

namespace app\models;

use app\models\Beverage;

class Water extends Beverage {
    function __construct($name, $volume) {
        parent::__construct($name, $volume);
    }
}