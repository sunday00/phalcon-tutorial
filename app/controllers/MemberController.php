<?php
declare(strict_types=1);

use App\Services\MemberService;

class MemberController extends \Phalcon\Mvc\Controller
{
    private MemberService $service;

    public function initialize() {
        $this->service = new MemberService();
    }

    public function signupAction()
    {
        if (  $this->request->isPost()  ){

            
            // $user = new Users();
            
            // // $success = $user->save($this->request->getPost(), null, [
            // //     "name", "email"
            // // ]);

            // $user->name = $this->request->getPost("name");
            // $user->email = $this->request->getPost("email");

            // $success = $user->save();

            // if ($success) {
            //     echo "registered";
            // } else {
            //     echo "sorry <br />";

            //     foreach( $user->getMessages() as $message){
            //         echo $message->getMessage(), "<br />";
            //     }
            // }
            $this->service->save($this->request);
            $this->view->disable();
        }

    }

    public function testAction()
    {
        MemberService::test();
    }
}

