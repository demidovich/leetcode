<?php

function dd(...$args)
{
    echo "<pre>";

    foreach ($args as $arg) {
        print_r($arg);
    }
}
