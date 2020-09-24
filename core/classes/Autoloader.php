<?php
class Autoloader
{
    static function load()
    {
        spl_autoload_register(function ($class){
            include_once 'classes/' . $class . '.php';
        });
    }
}
