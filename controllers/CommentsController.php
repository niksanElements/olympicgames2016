<?php

class CommentsController extends BaseController
{

    public function delete(string $dbName,int $id)
    {
        if($dbName === "post_comments") {
            if ($this->model->delete($dbName, $id)) {
                $this->addInfoMessage("Success!!");
            } else {
                $this->addErrorMessage("Place try again!!");
            }
            $this->redirect("manageforum");
        }
        else if($dbName === "news_comments"){
            if ($this->model->delete($dbName, $id)) {
                $this->addInfoMessage("Success!!");
            } else {
                $this->addErrorMessage("Place try again!!");
            }
            $this->redirect("managenews");
        }
    }
}