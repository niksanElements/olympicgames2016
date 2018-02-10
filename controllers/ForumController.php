<?php
class ForumController extends BaseController
{
    protected $commentsModel;

    // TODO: title access on every element

    function __construct($controllerName, $actionName)
    {
        parent::__construct($controllerName, $actionName);
        $this->commentsModel = new CommentsModel();
    }

    public function index()
    {
        $this->posts = $this->model->getLastPosts(10);
        $this->recentPosts = $this->commentsModel->getRecantComments();

        // $request_url = urldecode($_SERVER['REQUEST_URI']);
        // $url = "http://$_SERVER[HTTP_HOST]$request_url";
        $url = APP_ROOT . "/forum";
        $fbImageUrl = APP_ROOT . "/image/show/forum.png";
        $fbId = FB_ID;
        $keywords = "olympic, games, 2016, summer, olympic games, olympic games 2016, olympic sports, olympic air, history, olympic games 2016 history, discussion, history discussion, forum discussion";
        $description = "";

        // meta tags
        parent::addMetaTag("name='keywords' content=$keywords");
        parent::addMetaTag("name='author' content='Nikolay Nikolov'");
        parent::addMetaTag("name='description' content='$description'");
        parent::addMetatag(" name='viewport' content='width=device-width', initial-scale=1.0'");
        parent::addMetaTag("name='googlepagetype' content='Games'");
        // TODO: set proper google page id
        parent::addMetaTag("name='googlepageid' content=''");
        // TODO: set proper meta tags for facebook

        parent::addMetaTag("property='og:url' content='$url'");
        parent::addMetaTag("property='og:type' content='article'");
        parent::addMetaTag("property='og:title' content='Olympic Games 2016 History Forum'");
        parent::addMetaTag("property='og:description' content='Rio Olympic Games, discussion forum.'");
        parent::addMetaTag("property='og:image' content='$fbImageUrl'");        
        parent::addMetaTag("property='og:image:width' content='400'");
        parent::addMetaTag("property='og:i=height' content='400'");
        // TODO: get facebook id
        parent::addMetaTag("property='fb:app_id' content='$fbId'");
    }

    public function add()
    {
        if($this->isLoggedIn) {
            if ($this->isPost) {
                $title = $_POST['title'];
                $body = $_POST['body'];
                $post_id = $this->model->add($title, $body, $_SESSION['userID']);
                if ($post_id != 0) {
                    $this->redirect("forum", "read", array($post_id));
                } else {
                    $this->addErrorMessage("Can't add post in comments.");
                }
            }
        }
        else
        {
            $this->addErrorMessage("You must loggin!!!");
            $this->redirect("forum");
        }
        $this->recentPosts = $this->commentsModel->getRecantComments();
    }
    
    public function read(string $id = "\0")
    {
        if($id == "\0" || $id == '')
        {
            $this->redirect("forum");
        }
        else
        {
            if( strpos( $id, "_&_" ) == true )
            {
                $id = explode("_&_",$id)[1];
            }

            $post = $this->model->getByID($id);
            if(!$post){
                $this->addErrorMessage("Can't find this page.");
                $this->redirect("post");
            }
            $this->post = $post;
            $this->comments = $this->commentsModel->getPostComments($id);

            if($this->isPost){
                $comment = $_POST['comment'];
                if(strlen($comment) == 0){
                    $this->addErrorMessage("You must enter same comment!");
                }
                else{
                    if($this->commentsModel->addPostComment($comment,$id,$_SESSION['userID'])){
                        $this->redirect("forum", "read", array($id));
                    }
                }
            }
            $this->metaCalculation();
            $this->recentPosts = $this->commentsModel->getRecantComments();
        }
    }

    public function dictionary($char)
    {
        if($char === "all"){
            $this->posts = $this->commentsModel->getForumCommentsAll();
            $this->recentPosts = $this->commentsModel->getRecantComments();
        }
        else{
            $this->posts = $this->commentsModel->getForumComments($char);
            $this->recentPosts = $this->commentsModel->getRecantComments();
        }
    }

    protected function metaCalculation()
    {
        /**
         *  meta tags calculation
         */
        $url = APP_ROOT . "/forum/read/".$this->post['title']."_&_".$this->post['id'];
        $image = findImage($this->post['body']);
        $fbImageUrl = APP_ROOT . "/image/show/forum.png";
        $fbImageWidth = 400;
        $fbImageHeight = 400;
        if(count($image[0]) != 0)
        {
            $image = $image[0][0];
            // image src
            $s_pos = strpos($image, "src") + 5;
            $sub_image = substr($image,$s_pos,strlen($image));
            $e_pos = strpos($sub_image,"\"");
            $fbImageUrl = substr($sub_image,0,$e_pos);
            
            $size = getimagesize($fbImageUrl);
            $size = explode(" ",$size[3]);
            $filteredNumbers = array_filter(preg_split("/\D+/", $size[0]));
            $fbImageWidth = intval(reset($filteredNumbers));
            $filteredNumbers = array_filter(preg_split("/\D+/", $size[1]));
            $fbImageHeight = intval(reset($filteredNumbers));

            if($fbImageWidth < 250 || $fbImageHeight < 250)
            {
                $fbImageWidth += 250;
                $fbImageHeight += 250;
            }
        }
        $fbId = FB_ID;
        $title = $this->post['title'];
        $description = cutLongText($this->post['body']);
        $keywords = array_keys(getKeywords(strip_tags($this->post['body'])));
        $keywords = join(",",$keywords);

        // meta tags
        parent::addMetaTag("name='keywords' content='$keywords'");
        parent::addMetaTag("name='author' content='Nikolay Nikolov'");
        parent::addMetaTag("name='description' content='$description'");
        parent::addMetatag(" name='viewport' content='width=device-width', initial-scale=1.0'");
        // TODO: set proper google page id
        parent::addMetaTag("name='googlepageid' content=''");
        // TODO: set proper meta tags for facebook

        parent::addMetaTag("property='og:url' content='$url'");
        parent::addMetaTag("property='og:type' content='article'");
        parent::addMetaTag("property='og:title' content='$title'");
        parent::addMetaTag("property='og:description' content='$description'");
        parent::addMetaTag("property='og:image' content='$fbImageUrl'");        
        parent::addMetaTag("property='og:image:width' content='$fbImageWidth'");
        parent::addMetaTag("property='og:i=height' content='$fbImageHeight'");
        // TODO: get facebook id
        parent::addMetaTag("property='fb:app_id' content='$fbId'");
    }
}