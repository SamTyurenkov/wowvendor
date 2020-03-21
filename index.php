<?php

function loadCore($class) {
 $path = __DIR__ . '/core/';
 require_once $path . strtolower($class) .'.php';
}

function loadViews($class) {
 $path = __DIR__ . '/views/';
 require_once $path . strtolower($class) .'.php';
}

spl_autoload_register('loadCore');
spl_autoload_register('loadViews');

$route = new Router();
$route->request($_SERVER['REQUEST_URI']);