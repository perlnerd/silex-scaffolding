<?php

use App\Controller\SkeletonController;
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Knp\Provider\ConsoleServiceProvider;

$app          = new Application();
//Load the YAML config
$container    = new ContainerBuilder();
$loader       = new YamlFileLoader($container, new FileLocator(__DIR__ .'/../config/'));
$app['debug'] = false;
$app['env']   = 'prod';

$loader->load("console_config." . $app['env'] . ".yml");

$app['yaml_param'] = $container->getParameter('yaml_parameter');
$app['yaml_array'] = $container->getParameter('yaml_array');

$app->register(new DoctrineServiceProvider(), array(
    'db.options' => array(
    'driver'     => 'pdo_mysql',
    'host'       => 'localhost',
    'dbname'     => 'my_database',
    'user'       => 'username',
    'password'   => 'password',
    ),
));

$app->register(
    new ConsoleServiceProvider(),
    array(
        'console.name' => 'SilexConsoleApp',
        'console.version' => '0.0.1',
        'console.project_directory' => __DIR__ . "/.."
    )
);
