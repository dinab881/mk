<?php
/**
 * Created by PhpStorm.
 * User: dina
 * Date: 04.12.18
 * Time: 12:05
 */

namespace vendor\core;


class Registry
{
    public static $objects = [];
    protected static $instance;

    protected function __construct()
    {
        require_once ROOT .'/config/config.php';
        foreach ($config['components'] as $name => $component) {
            self::$objects[$name] = new $component;
        }
    }

    public static function instance()
    {
        if (self::$instance == null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function __get($name)
    {
        if (is_object(self::$objects[$name])) {
            return self::$objects[$name];
        }
    }

    public function __set($name, $object)
    {
        if (!isset(self::$objects[$name])) {
            self::$objects[$name] = new $object;
        }

    }

    public function getList()
    {
        echo '<pre>';
        var_dump(self::$objects);
        echo '</pre>';
    }
}