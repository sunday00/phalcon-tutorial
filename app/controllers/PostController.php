<?php
declare(strict_types=1);

namespace App\Controllers;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;

class PostController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public  function storeAction()
    {
        $validation = new Validation();
        $validation->add(
            'email',
            new Email(
                [
                    'message' => 'not valid email',
                ]
            )
        );

        $messages = $validation->validate($_POST);

        if (count($messages)) {
            foreach ($messages as $message) {
                dump( $message );
            }
        } else {
            dump($_POST);
        }

        dump( $this->request->isAjax() );
        dump( $this->request->isPut() );
        dump( $this->request->isDelete() );
        dump( $this->request->getBestCharset() );
        dump( $this->request->getBestLanguage() );
    }

    public function blogAction($pathVariable1, $pathVariable2, $pathVariable3, $pathVariable4 = null)
    {
        dump(__FUNCTION__, $pathVariable1, $pathVariable2, $pathVariable3, $pathVariable4);

    }

    public function newsAction($param1, $param2)
    {
        dump(__FUNCTION__);
        dump($param1, $param2);
    }
}

