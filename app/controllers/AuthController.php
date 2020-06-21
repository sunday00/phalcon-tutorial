<?php
declare(strict_types=1);

namespace App\Controllers;

use Phalcon\Tag;
use App\Models\User;

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

    public function signUpAction()
    {
        // show form
        // ref view
    }

    public function registerAction()
    {
        $this->view->disable();

        $user = new User;
        $result = $user->assign([
            "email" => $this->request->getPost('email'),
            "password" => $this->security->hash($this->request->getPost('password')),
        ])->save();

        if($result){
            $this->flashSession->success('Success register');
            return $this->response->redirect('/');
        } else {
            $this->flashSession->error( $user->getMessages()[0]->getMessage() );
            return $this->response->redirect('/auth/signUp');
        }
    }

    public function signInAction()
    {
        $this->view->disable();

        $user = User::findFirst([
            'email = :email: ',
            'bind' => [
                'email'     => $this->request->getPost('email'),
            ]
        ]);

        if( !$user || !$this->security->checkHash($this->request->getPost('password'), $user->password)){
            $this->flashSession->error('Wrong');
            return $this->response->redirect('/auth/info');
        }

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

