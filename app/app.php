<?php

require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Declaration of variables, 
// and service providers happens here.
include __DIR__.'/bootstrap.php';

// Map routes to controllers
include __DIR__ . '/routing.php';

return $app;
