<?php

namespace App\Services;

class MemberService
{

    private Users $user;
    
    public function initialize()
    {
        $this->$user = new Users();
    }

    public function test()
    {
        echo "HIHIHIHI test HIHIHIHIHI";
    }
    
    public function save($req)
    {
        var_dump($user);
        exit;
        $success = $user->save($req->getPost(), [
            "name", "email"
        ]);

        if ($success) {
            echo "registered";
        } else {
            echo "sorry";

            foreach( $this->getMessage() as $message){
                echo $message->getMessage(), "<br />";
            }
        }
    }
}