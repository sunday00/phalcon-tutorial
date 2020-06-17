<?php
declare(strict_types=1);
use Phalcon\Session\Manager;

/**
 * @property Manager $session
 */
class IndexController extends ControllerBase
{

    public function initialize()
    {
        $this->view->setTemplateBefore('index/header');
    }

    public function indexAction()
    {

    }

    public function startSessionAction()
    {
        $this->session->set('apple', 'red');
        $this->session->set('banana', 'yellow');
    }

    public function getSessionAction()
    {
        echo $this->session->get('apple');
        echo $this->session->get('banana');
    }

    public function deleteSessionAction()
    {
        $this->session->remove('apple');
    }

    public function flushSessionAction()
    {
        $this->session->destroy();
    }

}

