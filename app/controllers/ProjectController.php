<?php
declare(strict_types=1);

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

