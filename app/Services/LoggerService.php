<?php

namespace app\services;

class LoggerService {
    private static $instance = null;

    private function __construct()
    {
    }

    public static function getInstance()
    {
      if (self::$instance == null)
      {
        self::$instance = new LoggerService();
      }
   
      return self::$instance;
    }

    public function logToConsole($label, $message) {
        echo "\n", $label,  date('d/m/Y h:i'), $message, "\n";
    }
}