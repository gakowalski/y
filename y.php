<?php

function echo_line($text) {
    echo "$text\n";
}

function author() {
    echo_line('Grzegorz Kowalski');
}

function y($what_info = null) {
    global $y_full_path;
    switch ($what_info) {
        case 'dir':
        case 'directory':
        case 'folder':
            return dirname($y_full_path);
        case 'script':
        default: 
            return $y_full_path;
    }
}

if ($argc < 2)
    return;

$args = $argv;

$y_full_path = array_shift($args);
$function = array_shift($args);

if (function_exists($function)) {
    $return_value = count($args) ? call_user_func_array($function, $args) : $function();
    echo $return_value;
}
