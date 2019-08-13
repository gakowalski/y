<?php

function info($text) {
    echo "$text\n";
}

function author() {
    info('Grzegorz Kowalski');
}

if ($argc < 2)
    return;

if (function_exists($argv[1])) {
    $fun = $argv[1];
    $fun();
}
