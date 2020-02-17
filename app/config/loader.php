<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
    ]
)->register();

$loader->registerNamespaces(
    [
        'App\Models'         => $config->application->modelsDir,
        'App\Services'       => $config->application->servicesDir,
    ]
)->register();
