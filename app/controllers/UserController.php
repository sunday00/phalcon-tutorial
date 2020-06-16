<?php
declare(strict_types=1);

class UserController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->setVars([
            'one' => User::findFirst("deleted is null"),
            'count' => User::count('deleted is null'),
            'all' => User::find(['deleted is null'])
        ]);
    }

    public function createAction()
    {
        $user = new User();
        $user->email = "test".rand(0,100000)."@admin.com";
        $user->password = "1234";
        if( !$user->save() ) {
            var_dump( $user->getMessages() );
        } else {
            echo "done";
        }
    }

    public function updateAction()
    {
        $user = User::findFirst();
        if( !$user ){
            echo "Ths user is not found";
            die;
        }

        $user->email = "hello@bugbug.com";
        $user->save();
    }

    public function deleteAction()
    {
        $user = User::findFirst('deleted is null');
        if( !$user ) die("no more user");
        $user->delete();

    }

    public function restoreAction()
    {
        $user = User::findFirst('deleted = 1');
        if( !$user ) die("no more user");
        $user->deleted = null;
        $user->save();
    }

}

