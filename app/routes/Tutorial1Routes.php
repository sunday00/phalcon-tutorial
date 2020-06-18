<?php

class Tutorial1Routes extends Phalcon\Mvc\Router\Group
{
    public function initialize()
    {

        $this->add('/user/loginGet', 'User::loginProcessGet')->via(['GET']);

        $this->add('/aka/blog/:int/:params/:int/:params', [
            'controller' => 'post',
            'action' => 'blog',
            'pathVariable1' => 1,
            'pathVariable2' => 2,
            'pathVariable3' => 3,
            'pathVariable4' => 4,
        ]);
        $this->add('/aka/news/{str1}/{str2}', [
            'controller' => 'post',
            'action' => 'news'
        ]);
    }

    /**
     * @inheritDoc
     */
    public function addConnect(string $pattern, $paths = null): \Phalcon\Mvc\Router\RouteInterface
    {
        // TODO: Implement addConnect() method.
    }

    /**
     * @inheritDoc
     */
    public function addPurge(string $pattern, $paths = null): \Phalcon\Mvc\Router\RouteInterface
    {
        // TODO: Implement addPurge() method.
    }

    /**
     * @inheritDoc
     */
    public function addTrace(string $pattern, $paths = null): \Phalcon\Mvc\Router\RouteInterface
    {
        // TODO: Implement addTrace() method.
    }
}