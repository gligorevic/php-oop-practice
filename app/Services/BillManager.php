<?php

namespace app\services;

use app\models\Bill;
use app\models\Order;
use app\services\LoggerService;

class BillManager {
    private array $createdBills = [];
    private static $instance = null;
    private LoggerService $logger;

    private function __construct() {
        $this->logger = LoggerService::getInstance();
    }

    public static function getInstance() {
        if (self::$instance == null)
        {
        self::$instance = new BillManager();
        }
        return self::$instance;
    }

    public function createBill(Order $order) {
        $newBill = new Bill($order);

        foreach($this->createdBills as $bill) {
            if($bill->getOrder()->getId() == $order->getId()) throw new Exception("Bill already exists");
        }
        $this->logger->logToConsole("Racun: ", " Sto broj {$order->getTableNumber()}, naplata {$newBill->getFinalPrice()}rsd");
        $this->createdBills[] = $newBill;
        return $newBill;
    }

    public function getNumberOfBillsForTable(int $tableNumber) {
        $bills = [];
        foreach($this->createdBills as $bill) {
            if($bill->getTableNumber() == $tableNumber) {
                $bills[] = $bill;
            }
        }

        return sizeof($bills);
    }
}