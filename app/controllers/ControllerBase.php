<?php
declare(strict_types=1);

namespace App\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Tag;

class ControllerBase extends Controller
{
    public function initialize()
    {
        if( $this->request->getMethod() != 'GET' && !$this->security->checkToken() ){
            $this->flashSession->error('invalid csrf token');
            return $this->response->redirect($_SERVER['HTTP_REFERER']);
        }
        Tag::prependTitle('FireBall | ');
    }
}
