<?php

class ContactusController extends BaseController
{   
    protected $commentsModel;
    protected $forumModel;

    public function __construct($controllerName,$action)
    {
        parent::__construct($controllerName,$action);
        $this->commentsModel = new CommentsModel();
        $this->forumModel = new ForumModel();

        // meta tags
        // TODO: set keywords for meta tags
        parent::addMetaTag("name='keywords' content=''");
        parent::addMetaTag("name='author' content='Nikolay Nikolov'");
        // TODO: set proper description
        parent::addMetaTag("name='description' content='Olympic Games'");
        // TODO: set proper facebook meta tags
        parent::addMetaTag("property='og:url' content=''");
        parent::addMetaTag("property='og:type' content=''");
        parent::addMetaTag("property='og:title' content=''");
        parent::addMetaTag("property='og:description' content=''");
        parent::addMetaTag("property='og:image' content=''");        
        parent::addMetaTag("property='og:image:width' content=''");
        parent::addMetaTag("property='og:i=height' content=''");
        parent::addMetaTag("property='fb:app_id' content=''");
    }
    
    public function index()
    {
        $post = $this->forumModel->getByID(CONTACT_US_FORUM);

        if(!$post){
            $this->addErrorMessage("Can't find this page.");
            $this->redirect("post");
        }
        $this->post = $post;
        $this->comments = $this->commentsModel->getPostComments(CONTACT_US_FORUM);
        if($this->isPost){
            $comment = $_POST['comment'];
            if(strlen($comment) == 0){
                $this->addErrorMessage("You must enter same comment!");
            }
            else{
                if($this->commentsModel->addPostComment($comment,CONTACT_US_FORUM,$_SESSION['userID'])){
                    $this->redirect("forum", "read", array(CONTACT_US_FORUM));
                }
            }
        }
    }

    public function members()
    {
        $this->contactus = $this->model->getContactus();
    }

    public function create()
    {
        if($this->isPost){
            $name=$_POST['name'];
            $body = $_POST['body'];
            $age=$_POST['age'];
            $education=$_POST['education'];
            $work=$_POST['work'];
            $passion=$_POST['passion'];

            if($this->model->create($name,$body,$age,$education,$work,$passion,$_SESSION['userID'])) {

                $this->addInfoMessage('Successful create!');
                $this->redirect("contactus");
            }
        }
    }

    public function profil(int $id)
    {
        $contactus = $this->model->getByID($id);
        if(!$contactus){
            $this->addErrorMessage("Can't find this page.");
            $this->redirect("contactus");
        }
        $this->contactus = $contactus;
    }
    public function edit(int $id)
    {
        $this->contactus = $this->model->getById($id);
        if($this->isPost){
            if (isset($_POST["name"]) && isset($_POST["body"]) && isset($_POST["age"])
            && isset($_POST["education"]) && isset($_POST["work"]) && isset($_POST["passion"])) {

                $name = $_POST['name'];
                $body = $_POST['body'];
                $age = $_POST['age'];
                $education = $_POST['education'];
                $work = $_POST['work'];
                $passion = $_POST['passion'];

                if ($this->model->edit($name, $body, $age, $education, $work, $passion,$id )) {

                    $this->addInfoMessage('Successful change!');
                    $this->redirect("contactus");
                }
            }
        }
    }
}
