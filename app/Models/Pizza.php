<?php

namespace app\models;

use app\models\Food;

class Pizza extends Food {
    function __construct($name) {
        parent::__construct($name);
    }

    
}