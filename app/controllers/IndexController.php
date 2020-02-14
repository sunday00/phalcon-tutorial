<?php
declare(strict_types=1);

class IndexController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        //not view just return string
        return "<h1>HI</h1>";
    }

}

