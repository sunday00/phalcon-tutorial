<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->routesDir,
        $config->application->controllersDir,
        $config->application->modelsDir
    ]
);

$loader->registerFiles([
    BASE_PATH . "/vendor/autoload.php"
]);

$loader->registerNamespaces([
    'App\Controllers' => '/app/controllers/',
    'App\Models' => '/app/models/',
]);

$loader->register();
