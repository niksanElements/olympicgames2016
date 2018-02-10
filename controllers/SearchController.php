<?php
class SearchController extends BaseController
{
  function index()
  {
    if($this->isPost)
    {
      $this->newsResults = NULL;
      $this->postsResults = NULL;
      $this->search = $_POST["search"];
      if(isset($_POST["news"]))
      {
        $this->newsResults = $this->model->searchNews($this->search);
      }
      if(isset($_POST["posts"]))
      {
        $this->postsResults = $this->model->searchPosts($this->search);
      }
    }
    else
    {
      $this->redirect("home", "index");
    }
  }
}
?>
