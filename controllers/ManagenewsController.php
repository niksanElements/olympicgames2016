<?php
class ManagenewsController extends BaseController
{
    protected $commentsModel;
    public function __construct($controllerName, $actionName)
    {
        parent::__construct($controllerName, $actionName);
        $this->commentsModel = new CommentsModel();
    }

    function index()
    {
        $this->authorizeAdmin();
        $this->news = $this->model->getAllNews();
        $index = 0;
        foreach($this->news as $element){
            $this->news[$index]['comments'] = $this->commentsModel->getNewsComments($element['id']);
            $index++;
        }
    }
}
?>
