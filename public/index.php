<?php
declare(strict_types=1);

use Phalcon\Di\FactoryDefault;
use Phalcon\Cache\AdapterFactory;
use Phalcon\Mvc\Model\MetaData\Redis;

error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

try {
    /**
     * The FactoryDefault Dependency Injector automatically registers
     * the services that provide a full stack framework.
     */
    $di = new FactoryDefault();

    /**
     * Read services
     */
    include APP_PATH . '/config/services.php';

    /**
     * Handle routes
     */
    include APP_PATH . '/config/router.php';

    /**
     * Get config service for use in inline setup below
     */
    $config = $di->getConfig();


    /**
     * models metadata using redis
     */
    $di['modelsMetadata'] = function () use ( $config ) {
        // Create a metadata manager with Redis
        $metadata = new Redis( new AdapterFactory,
            $config->modelsMetadata->toArray()
        );

        return $metadata;
    };

    /**
     * Include Autoloader
     */
    include APP_PATH . '/config/loader.php';

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle($_SERVER['REQUEST_URI'])->getContent();
} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
