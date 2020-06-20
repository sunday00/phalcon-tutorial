<?php
declare(strict_types=1);

namespace App\Controllers;
use Phalcon\Tag;

class AuthController extends ControllerBase
{

    public function initialize()
    {
        parent::initialize();
        Tag::setTitle('Member');

        $this->assets->collection('addCollection')
            ->addCss('css/auth.css');
    }

    public function indexAction()
    {
        // show form
        // ref view
    }

    public function signInAction()
    {
        $this->session->set('role', 'member');
        $this->response->redirect('/');
    }

    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect('/');
    }

    public function infoAction()
    {

    }

}

