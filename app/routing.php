<?php

$routeFormat = 'routes/%s.route.php';
$routes      = array(
                'home',
                'database',
                'encode',
                'hello',
                'yaml',
                );

foreach ($routes as $route) {
    require_once sprintf($routeFormat, $route);
}
