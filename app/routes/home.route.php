<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

/*
*
* The Main index route.
* 
*/
$app->get('/', function (Request $request) use ($app) {
    $data = array();
    $form = $app['form.factory']->createBuilder('form', $data)
        ->add('Username', 'text', array(
            'constraints' => array(new Assert\NotBlank()),
            'attr' => array('class' => 'form-control', 'placeholder' => 'Username')
        ))
        ->add('Password', 'password', array(
            'constraints' => array(new Assert\NotBlank()),
            'attr' => array('class' => 'form-control', 'placeholder' => 'password')
        ))
        ->add('Sign In', 'submit', array(
            'attr' => array('class' => 'btn btn-success')
        ))
        ->getForm();

    return $app['twig']->render('layout.twig', array(
        'form'          => $form->createView(),
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('home');
