<?php

namespace app;

use app\models\Test;
use app\models\Juice;
use app\models\Meal;
use app\models\Pasta;
use app\models\SideDish;
use app\models\Order;
use app\models\Table;
use app\models\Bill;


/**
 * Class Main
 * @package app
 */
class Main
{
    /**
     * Method that starts the application
     *
     * @return string
     * @throws \Exception
     */
    public function main()
    {
        $juice = new Juice("Orange", 300);
        $pasta = new Pasta("Carbonara");
        $meal = new Meal($pasta);
        
        $sideDish = new SideDish("Origano");
        $meal->addSideDish($sideDish);
        echo $meal->calculatePrice();

        $table1 = new Table(1);
        $order = new Order($table1->getNumber());
        $order->addMeal($meal);
        $order->addBeverage($juice);
        
        $bill = new Bill($order);
        
        echo $bill->getFinalPrice();

        $testObj = new Test();
        return $testObj->getTestVar();
    }
}