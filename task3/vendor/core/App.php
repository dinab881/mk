<?php
/**
 * Created by PhpStorm.
 * User: dina
 * Date: 04.12.18
 * Time: 12:07
 */

namespace vendor\core;

class App
{
    public static $app;

    public function __construct()
    {
        self::$app = Registry::instance();
    }
}