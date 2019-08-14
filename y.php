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

function alias($alias, $real_name = null) {
    global $y_full_path;
    
    $y_alias_path = dirname($y_full_path) . '/alias.csv';
    
    if ($real_name == '.') {
        $real_name = rtrim(`pwd`);
    }

    if ($real_name === null) {
        $rows = `cat $y_alias_path | grep $alias`;
        if (is_array($rows)) $rows = $rows[0];
        $real_name = explode(',', $rows)[1];
    } else {
        $handle = fopen($y_alias_path, 'a');
        fputcsv($handle, array($alias, $real_name));
        fclose($handle);
    }
    
    return $real_name;
}

function wordpress() {
    $defines = `cat wp-config.php | grep define\(`;
    $prefix = `cat wp-config.php | grep table_prefix`;

    eval($defines);
    if (!empty($prefix)) eval($prefix);

    $link = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($link->connect_error) {
        echo_line($link->connect_error());
        exit;
    } else {
        $link->set_charset('utf8');
        echo_line($table_prefix);
        $query = "select * from {$table_prefix}users";
        var_dump($query);
        var_dump($link->query($query));
    }
    $link->close();
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
