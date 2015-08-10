<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\Validator\Constraints as Assert;

$app->get('/hello/{name}', function ($name) use ($app) {
    $greeting = $app['skeleton_controller']->greetAction($name);

    return $app['twig']->render('pages/hello.twig', array('greeting' => $greeting, 'name' => $name));
})
->bind('hello')
->value('name', 'Guest');
