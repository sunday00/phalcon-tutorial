<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Project;
use App\Models\User;

class ProjectController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function createAction()
    {
        $user = User::findFirst('deleted is null');
        $project = new Project;
        $project->user = $user;
        $project->title = 'apple';
        $project->save();

        dump($project);
    }


}

