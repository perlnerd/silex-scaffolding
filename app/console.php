#!/usr/bin/env php
<?php
require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;
use App\Command\SilexCommand;
set_time_limit(0);

include __DIR__.'/console_bootstrap.php';
$console = &$app["console"];

$console->add(new SilexCommand());
$console->run();