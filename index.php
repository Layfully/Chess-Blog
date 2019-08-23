<?php

use Controller\HomeController;

require_once 'autoloader.php';

$id = get($_GET['id'], null);
$controllerName = ucfirst(get($_GET['task'])).'Controller';
$controllerName = "\\Controller\\$controllerName";

if(class_exists($controllerName)){
    $ob = new $controllerName();
    $ob->$_GET['action']($id);
}
else{
    $ob = new HomeController();
    $ob->index($id);
}

function get(&$var, $default='/') {
    return isset($var) ? $var : $default;
}
