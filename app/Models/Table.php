<?php

namespace app\models;

class Table  {
    private int $number;
    
    function __construct($number) {
        $this->number = $number;
    }

    public function getNumber() : int {
        return $this->number;
    }
}