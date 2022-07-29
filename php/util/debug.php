<?php

function dd(...$args)
{
    echo "<pre>";

    foreach ($args as $arg) {
        print_r($arg);
        echo "\n";
    }

    echo "</pre>";
    exit;
}
