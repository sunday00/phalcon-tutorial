<?php
declare(strict_types=1);

namespace App\Controllers;

class AssetTestController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->assets->addCss('css/style.css');
        $this->assets->addJs('js/app.js');
        // this should be insert into baseController initialize method, so any page can view same style, same js.

        $animal1 = new \App\Models\Animal('tiger');
        $animal1->type = 'EatingAnotherAnimal';
        $animal1->live = 'land';
        $animal1->like = ['water', 'eat', 'play', 'sleep'];

        $this->view->setVar('animal1', $animal1);
    }

}

