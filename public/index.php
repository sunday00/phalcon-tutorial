<?php
declare(strict_types=1);

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Dispatcher;

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
     * Get config service for use in inline setup below
     */
    $config = $di->getConfig();

    /**
     * Include Autoloader
     */
    include APP_PATH . '/config/loader.php';

    /**
     * models metadata using redis
     */
    $di['modelsMetadata'] = function () use ( $config ) {
        // Create a metadata manager with Redis
        $metadata = new \Phalcon\Mvc\Model\MetaData\Redis( new \Phalcon\Cache\AdapterFactory, $config->redis->toArray() );

        return $metadata;
    };

    /**
     * Prepare Namespace using
     */
    $di->set(
        'dispatcher',
        function () {
            $dispatcher = new Dispatcher();

            $dispatcher->setDefaultNamespace(
                'App\Controllers'
            );

            return $dispatcher;
        }
    );

    /**
     * Session share
     */
    $di->set('session', function () use ( $config ) {
        $session = new \Phalcon\Session\Manager();
        $factory = new \Phalcon\Storage\AdapterFactory( new \Phalcon\Storage\SerializerFactory );
        $redis = new \Phalcon\Session\Adapter\Redis($factory, $config->redis->toArray());

        $session->setAdapter($redis)->start();

        return $session;
    });

    /**
     * Handle routes
     */
    include APP_PATH . '/config/router.php';

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle($_SERVER['REQUEST_URI'])->getContent();
} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
    dump($e);
}
