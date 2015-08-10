<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\Validator\Constraints as Assert;

$app->get('/encode/{password}', function ($password) use ($app) {
    return $app['security.encoder.digest']->encodePassword($password, '');
})->bind('encode')
->value('password', 'password');
