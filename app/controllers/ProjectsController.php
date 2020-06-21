<?php
declare(strict_types=1);

namespace App\Controllers;

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model;
use App\Models\Project;

class ProjectsController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        //
    }

    /**
     * Searches for projects
     */
    public function searchAction()
    {
        $numberPage = $this->request->getQuery('page', 'int', 1);
        $parameters = Criteria::fromInput($this->di, '\App\Models\Project', $_GET)->getParams();
        $parameters['order'] = "id";

        $paginator   = new Model(
            [
                'model'      => '\App\Models\Project',
                'parameters' => $parameters,
                'limit'      => 10,
                'page'       => $numberPage,
            ]
        );

        $paginate = $paginator->paginate();

        if (0 === $paginate->getTotalItems()) {
            $this->flash->notice("The search did not find any projects");

            $this->dispatcher->forward([
                "controller" => "projects",
                "action" => "index"
            ]);

            return;
        }

        $this->view->page = $paginate;
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {
        //
    }

    /**
     * Edits a project
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {
            $project = Project::findFirstByid($id);
            if (!$project) {
                $this->flash->error("project was not found");

                $this->dispatcher->forward([
                    'controller' => "projects",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->id = $project->id;

            $this->tag->setDefault("id", $project->id);
            $this->tag->setDefault("user_id", $project->user_id);
            $this->tag->setDefault("title", $project->title);
            $this->tag->setDefault("created_at", $project->created_at);
            $this->tag->setDefault("updated_at", $project->updated_at);
            
        }
    }

    /**
     * Creates a new project
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "projects",
                'action' => 'index'
            ]);

            return;
        }

        $project = new Project();
        $project->user_id = $this->request->getPost("user_id", "int");
        $project->title = $this->request->getPost("title", "string");

        if (!$project->save()) {
            foreach ($project->getMessages() as $message) {
                dd( $message->getMessage() );
            }

            $this->dispatcher->forward([
                'controller' => "projects",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("project was created successfully");

        $this->dispatcher->forward([
            'controller' => "projects",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a project edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "projects",
                'action' => 'index'
            ]);

            return;
        }

        $id = $this->request->getPost("id");
        $project = Project::findFirstByid($id);

        if (!$project) {
            $this->flash->error("project does not exist " . $id);

            $this->dispatcher->forward([
                'controller' => "projects",
                'action' => 'index'
            ]);

            return;
        }

        $project->userId = $this->request->getPost("user_id", "int");
        $project->title = $this->request->getPost("title", "int");
        $project->createdAt = $this->request->getPost("created_at", "int");
        $project->updatedAt = $this->request->getPost("updated_at", "int");
        

        if (!$project->save()) {

            foreach ($project->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "projects",
                'action' => 'edit',
                'params' => [$project->id]
            ]);

            return;
        }

        $this->flash->success("project was updated successfully");

        $this->dispatcher->forward([
            'controller' => "projects",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a project
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $project = Project::findFirstByid($id);
        if (!$project) {
            $this->flash->error("project was not found");

            $this->dispatcher->forward([
                'controller' => "projects",
                'action' => 'index'
            ]);

            return;
        }

        if (!$project->delete()) {

            foreach ($project->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "projects",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("project was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "projects",
            'action' => "index"
        ]);
    }
}
