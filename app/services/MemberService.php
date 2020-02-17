<?php

namespace App\Services;

use App\Models\Users;

class MemberService
{

    private Users $user;
    
    public function __construct()
    {
        $this->user = new Users();
    }

    public function test()
    {
        echo "HIHIHIHI test HIHIHIHIHI";
    }
    
    public function save($req)
    {
        $this->user->name = $req->getPost("name");
        $this->user->email = $req->getPost("email");

        $success = $this->user->save();

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