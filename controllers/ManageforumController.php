<?php

class ManageforumController extends BaseController
{
    protected $commentModel;

    public function __construct($controllerName, $actionName)
    {
        parent::__construct($controllerName, $actionName);
        $this->commentModel = new CommentsModel();
    }

    public function index()
    {
        $this->authorizeAdmin();
        $this->posts = $this->model->getAllPosts();
        $index = 0;
        foreach($this->posts as $post){
            $this->posts[$index]['comments'] = $this->commentModel->getPostComments($post['id']);
            $index++;
        }
    }

    public function edit(int $id)
    {
        $this->authorizeAdmin();
        $this->post = $this->model->getById($id);
        if($this->isPost) {
            $title = $_POST['title'];
            $body = $_POST['body'];
            if($this->model->edit($id,$title,$body)){
                $this->addInfoMessage("Success!!");
                $this->redirect("manageforum");
            }
            else{
                $this->addErrorMessage("Place try again!");
            }
        }
    }

    public function delete(int $id)
    {
        if ($this->model->deleteComments($id) && $this->model->delete($id)){
            $this->addInfoMessage("Success!!");
            $this->redirect("manageforum");
        }
        else{
            $this->addErrorMessage("Place try again!");
            $this->redirect("manageforum");
        }
    }
}