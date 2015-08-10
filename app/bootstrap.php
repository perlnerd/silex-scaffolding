<?php

use App\Controller\SkeletonController;
use App\User\UserProvider;
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\SecurityServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

// APP_ENV is set in the nginx config
$env          = getenv('APP_ENV') ?: 'dev';
$app          = new Application();
$app['debug'] = false;
$app['env']   = $env;

if ($app['env'] == 'dev') {
    $app['debug'] = true;
}

//Load the YAML config
$container = new ContainerBuilder();
$loader    = new YamlFileLoader($container, new FileLocator(__DIR__ .'/../config/'));

$loader->load("config." . $env . ".yml");

$app['yaml_param'] = $container->getParameter('yaml_parameter');
$app['yaml_array'] = $container->getParameter('yaml_array');

$app['skeleton_controller'] = $app->share(
    function () use ($app) {
        return new SkeletonController($app['env']);
    }
);

$app->before(function ($request) use ($app) {
    $app['twig']->addGlobal('app_env', $app['env']);
    $app['twig']->addGlobal('active', $request->get("_route"));
});
$app->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../html/views',
));
$app->register(new UrlGeneratorServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new TranslationServiceProvider(), array(
    'translator.domains' => array(),
));
$app->register(new FormServiceProvider());
$app->register(new SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'default' => array(
            'pattern' => '^.*$',
            'anonymous' => true, // Needed as the login path is under the secured area
            'form' => array('username_parameter' => 'form[Username]',
                            'password_parameter' => 'form[Password]',
                            'login_path' => '/',
                            'check_path' => 'login_check'
                            ),
            'logout' => array('logout_path' => '/logout'), // url to call for logging out
            'users' => $app->share(function () use ($app) {
                // Specific class App\User\UserProvider is used below
                return new UserProvider($app['db']);
            }),
        ),
    ),
    'security.access_rules' => array(
        // You can rename ROLE_USER as you wish
        array('^/.+$', 'ROLE_USER'),
    )
));
$app->register(new SessionServiceProvider());
$app->register(new DoctrineServiceProvider(), array(
    'db.options' => array(
    'driver'     => 'pdo_mysql',
    'host'       => 'localhost',
    'dbname'     => 'my_database',
    'user'       => 'username',
    'password'   => 'password',
    ),
));

$app['twig'] = $app->share($app->extend('twig', function ($twig, $app) {
    $twig->addFunction(new \Twig_SimpleFunction('asset', function ($asset) use ($app) {
        return sprintf('%s/%s', trim($app['request']->getBasePath()), ltrim($asset, '/'));
    }));

    return $twig;
}));
