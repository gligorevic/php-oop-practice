<?php

namespace app;

use app\models\Test;

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
        $testObj = new Test();
        return $testObj->getTestVar();
    }
}