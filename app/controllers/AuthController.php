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

    public function signInAction()
    {

    }

}

