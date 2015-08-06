<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\Validator\Constraints as Assert;

$app->get('/', function () use ($app) {
    return $app['twig']->render('layout.twig');
})->bind('home');

$app->match('/database', function (Request $request) use ($app) {

    $entries = $app['db']->fetchAll('SELECT * FROM some_data');

    return $app['twig']->render('pages/database.twig', array('dbResult' => $entries));

})->bind('database');

$app->get('/hello/{name}', function ($name) use ($app) {
    $greeting = $app['skeleton_controller']->greetAction($name);

    return $app['twig']->render('pages/hello.twig', array('greeting' => $greeting, 'name' => $name));
})
->bind('hello')
->value('name', 'Guest');

$app->get('/yaml', function () use ($app) {
    return $app['twig']->render('pages/yaml.twig', array('yaml_param' => $app['yaml_param'], 'yaml_array' => $app['yaml_array']));
})
->bind('yaml');
