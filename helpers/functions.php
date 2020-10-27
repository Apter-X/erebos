<?php
function printed($vars)
{
    echo "<div class=\"float-right col text-right\"><pre>";   
        print_r($vars);
        echo "<div>----------------------</div>";
    echo "</pre></div>";
}

function debug($vars)
{
    echo "<div class=\"float-right col text-right\"><pre>";
        var_dump($vars);
        echo "<div>----------------------</div>";
    echo "</pre></div>";
}

function str_secure($string)
{
    return htmlspecialchars($string);
}

function load_classes(){
    spl_autoload_register(function ($class){
        include_once '../core/classes/'. $class . '.php';
    });
}