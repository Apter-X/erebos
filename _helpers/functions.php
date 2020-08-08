<?php
function printed($vars)
{
    echo "<pre>";   
        print_r($vars);
    echo "</pre>";
}

function debug($vars)
{
    echo "<pre>";
        var_dump($vars);
    echo "</pre>";
}

function str_secure($string)
{
    return trim(htmlspecialchars($string));
}