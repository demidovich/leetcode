<?php

function dd(...$args)
{
    if (php_sapi_name() === "cli") {
        $startTag = $finalTag = "\n";
    } else {
        $startTag = $finalTag = "<pre>";
    }

    $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
    $filename  = "noname";
    if (! empty($backtrace[0]["file"])) {
        $filename = $backtrace[0]["file"];
        $filename = str_replace(getcwd() . "/", "", $filename);
    }

    echo $startTag;
    echo $filename;
    echo "\n\n";

    foreach ($args as $arg) {
        print_r($arg);
        echo "\n";
    }

    echo $finalTag;
    exit;
}
