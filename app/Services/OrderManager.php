<?php

namespace app\services;

use app\models\Bill;
use app\models\Order;
use app\services\BillManager;
use \Exception;

class OrderManager {
    private array $createdOrders = [];
    private static $instance = null;
    private BillManager $billManager;
    private LoggerService $logger;

    private function __construct() {    
        $this->billManager = BillManager::getInstance();
        $this->logger = LoggerService::getInstance();
    }

    public static function getInstance() {
        if (self::$instance == null)
        {
        self::$instance = new OrderManager();
        }
        return self::$instance;
    }

    
    public function createOrder(int $tableNumber) {
        $OrdersNumForTable = $this->getOrdersNumberForTable($tableNumber);
        $BillsNumForTable = $this->billManager->getNumberOfBillsForTable($tableNumber);
        
        if($OrdersNumForTable != $BillsNumForTable) { throw new Exception("Nije moguće izdati novu porudžbinu jer prethodna nije plaćena");}

        $newOrder = new Order(sizeof($this->createdOrders), $tableNumber);
        
        $this->logger->logToConsole("Porudzbina: ", " Sto broj {$newOrder->getTableNumber()}");
        $this->createdOrders[] = $newOrder;
        
        return $newOrder;
    }

    private function getOrdersNumberForTable(int $tableNumber) {
        $orders = [];
        foreach($this->createdOrders as $order) {
            if($order->getTableNumber() == $tableNumber) {
                $orders[] = $order;
            }
        }

        return sizeof($orders);
    }
}