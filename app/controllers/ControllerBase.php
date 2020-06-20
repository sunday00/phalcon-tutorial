<?php
declare(strict_types=1);

namespace App\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Tag;

class ControllerBase extends Controller
{
    public function initialize()
    {
        Tag::prependTitle('FireBall | ');

    }
}
