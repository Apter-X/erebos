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
    return trim(htmlspecialchars($string));
}