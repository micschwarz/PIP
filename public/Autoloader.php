<?php

class Autoloader
{
    public function __construct()
    {
        spl_autoload_register(array($this, 'load_class'));
    }

    public static function register()
    {
        new Autoloader();
    }

    public function load_class($class_name)
    {
        $file = realpath(__DIR__) . '/../src/' . strtolower(str_replace('\\', '/', $class_name)) . '.php';
        if (file_exists($file)) {
            require_once($file);
        }
    }
}

Autoloader::register();
