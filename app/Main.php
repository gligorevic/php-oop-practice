<?php

namespace app;

use app\models\Test;
use app\models\Juice;
use app\models\Soda;
use app\models\Water;
use app\models\Meal;
use app\models\Pasta;
use app\models\Pizza;
use app\models\SideDish;
use app\models\Order;
use app\models\Table;
use app\models\Bill;

use app\services\OrderManager;
use app\services\BillManager;



/**
 * Class Main
 * @package app
 */
class Main
{
    /**
     * Method that starts the application
     *
     * @throws \Exception
     */
    public function main()
    {   
        $billManager = BillManager::getInstance();
        $orderManager = OrderManager::getInstance();

        $table1 = new Table(1);
        $table2 = new Table(2);
        $table3 = new Table(3);
        $table4 = new Table(4);

        $pizzaCapricciosa = new Pizza("Capriciosa");
        $pizzaSiciliana = new Pizza("Siciliana");

        $pastaItaliana = new Pasta("Pasta Italiana");
        $pastaCarbonara = new Pasta("Pasta Carboanara");

        $ketchup = new SideDish("Ketchup");
        $origano = new SideDish("Origano");
        $extraCheese = new SideDish("Extra Cheese");

        $coke = new Soda("Coca cola", 500);
        $fanta = new Soda("Fanta", 300);
        $water = new Water("Water", 250);
        $juice = new Juice("Juice", 250);
        $juice500 = new Juice("Juice", 500);
        

        //Order 1
        $meal11 = new Meal($pizzaCapricciosa);
        $meal11->addSideDish($ketchup);
        $meal11->addSideDish($origano);

        $meal12 = new Meal($pastaItaliana);
        $meal12->addSideDish($extraCheese);
        
        $order1 = $orderManager->createOrder($table1->getNumber());
        $order1->addMeal($meal11);
        $order1->addMeal($meal12);
        $order1->addBeverage($coke);
        $order1->addBeverage($coke);

        //Order 2
        $order2 = $orderManager->createOrder($table2->getNumber());
        $order2->addFood($pizzaSiciliana);
        $order2->addFood($pastaCarbonara);
        $order2->addBeverage($juice);

        //Order 3
        $order3 = $orderManager->createOrder($table3->getNumber());
        $meal31 = new Meal($pizzaCapricciosa);
        $meal31->addSideDish($ketchup);
        $order3->addFood($pizzaCapricciosa);
        $order3->addMeal($meal31);
        $order3->addMeal($meal31);
        $order3->addBeverage($water);
        $order3->addBeverage($fanta);
        $order3->addBeverage($juice500);

        $bill1 = $billManager->createBill($order1);
        $bill3 = $billManager->createBill($order3);

        try {
            $order4 = $orderManager->createOrder($table2->getNumber());
        } catch(\Exception $e) {
            echo "\n", $e->getMessage(), "\n";
        }
        
        $bill2 = $billManager->createBill($order2);

        $order4 = $orderManager->createOrder($table2->getNumber());

        // $juice = new Juice("Orange", 300);
        // $pasta = new Pasta("Carbonara");
        // $meal = new Meal($pasta);
        
        // $sideDish = new SideDish("Origano");
        // $meal->addSideDish($sideDish);
        // echo $meal->calculatePrice();

        // $table1 = new Table(1);
        // $order = new Order($table1->getNumber());
        // $order->addMeal($meal);
        // $order->addBeverage($juice);
        
        // $bill = new Bill($order);
        
        // echo $bill->getFinalPrice();
    }
}