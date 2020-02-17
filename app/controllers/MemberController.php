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
            $this->service->save($this->request);
            $this->view->disable();
        }

    }

    public function testAction()
    {
        MemberService::test();
    }
}

