<?php

// setup the autoloading
require_once 'vendor/autoload.php';
// setup Propel
require_once 'generated-conf/config.php';

/*
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
*/
use Propel\Runtime\Propel;

//setup whoops
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

/*$defaultLogger = new Logger('defaultLogger');
$defaultLogger->pushHandler(new StreamHandler('/var/log/propel.log', Logger::WARNING));
Propel::getServiceContainer()->setLogger('defaultLogger', $defaultLogger);
*/