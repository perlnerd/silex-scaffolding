<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\Validator\Constraints as Assert;

$app->get('/yaml', function () use ($app) {
    return $app['twig']->render('pages/yaml.twig', array('yaml_param' => $app['yaml_param'], 'yaml_array' => $app['yaml_array']));
})
->bind('yaml');
