<?php
spl_autoload_register(function ($class) {
    $parts = explode('\\', $class);
    $parts = implode('/', $parts);

    if(file_exists($parts.'.php')){
        require_once $parts.'.php';
    }
});