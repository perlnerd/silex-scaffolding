<?php

$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);

if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

$app = require __DIR__ . '/../app/app.php';

if ($app instanceof Silex\Application) {
    $app->run();
}

if (false === ($app instanceof Silex\Application)) {
    $message = array('status' => 'error', 'message' => 'Failed to initialize application.');

    header("HTTP/1.0 500 Error");
    header('Content-type: application/json');
    echo json_encode($message);
}