<?php

function echo_line($text) {
    echo "$text\n";
}

function author() {
    echo_line('Grzegorz Kowalski');
}

if ($argc < 2)
    return;

$args = $argv;

$y_full_path = array_shift($args);
$function = array_shift($args);

if (function_exists($function)) {
    switch (count($args)) {
        case 0: $function(); break;
        case 1: $function($args[0]); break;
        default: $function($args);
    }
}
