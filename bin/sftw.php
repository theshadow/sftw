#!/usr/bin/env php
<?php

use Symfony\Component\Console;
use Dws\Symfony\Component\Console\Command\Sftw;

function includeIfExists($file)
{
    if (file_exists($file)) {
        return include $file;
    }
}

if ((!$loader = includeIfExists(__DIR__.'/../vendor/autoload.php')) && (!$loader = includeIfExists(__DIR__.'/../../../autoload.php'))) {
    die('You must set up the project dependencies, run the following commands:'.PHP_EOL.
        'curl -s http://getcomposer.org/installer | php'.PHP_EOL.
        'php composer.phar install'.PHP_EOL);
}

$application = new Console\Application('South For the Winter - a db migration tool', '0.1.0');

$application->add(new Sftw\Current());
$application->add(new Sftw\Latest());
$application->add(new Sftw\Migrate());
$application->add(new Sftw\PointTo());

$application->run();
