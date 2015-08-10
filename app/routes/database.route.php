<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\Validator\Constraints as Assert;

$app->match('/database', function () use ($app) {
    $entries = $app['db']->fetchAll('SELECT * FROM some_data');

    return $app['twig']->render('pages/database.twig', array('dbResult' => $entries));
})->bind('database');
