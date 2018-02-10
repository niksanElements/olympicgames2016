<?php


class NewsController extends BaseController
{
    protected $commentModel;
    protected $meta_keywords;
    protected $meta_description;
    // Here we get the last 8 news and pass them in  $this->news
    // We get the users news title  too, and pass them in $this->userNews

    // TODO: make every news with micro data

    function __construct($controllerName, $actionName)
    {
        parent::__construct($controllerName, $actionName);
        $this->commentModel = new CommentsModel();
    }

    public function index()
    {
        $this->news = $this->model->getLastNews(8);
        $this->last10News = $this->model->getLastNews(10);
        if($this->isRedactor) {
            $user_id = intval($_SESSION['userID']);
            $this->userNews = $this->model->getUserNewsTitles($user_id);
        }

        $this->meta_keywords = "olympic, games, 2016, summer, olympic games, olympic games 2016, olympic sports, olympic air, history, olympic games 2016 history, news, olympic newsletter, newsletter, newscaster, olympic newscaster, olympic news history, top 2016 olympic news, days, news from the event";

        $this->meta_description = "Olympic news from Rio 2016...Here you can find the top news from back then. All about every day of the event, athletes, medals and more..";


        // $request_url = urldecode($_SERVER['REQUEST_URI']);
        // $url = "http://$_SERVER[HTTP_HOST]$request_url";
        $url = APP_ROOT . "/news";
        $fbImageUrl = APP_ROOT . "/image/show/News.gif";
        $fbId = FB_ID;

        // meta tags
        parent::addMetaTag("name='keywords' content=$this->meta_keywords");
        parent::addMetaTag("name='author' content='Nikolay Nikolov'");
        parent::addMetaTag("name='description' content='$this->meta_description'");
        parent::addMetatag(" name='viewport' content='width=device-width', initial-scale=1.0'");
        parent::addMetaTag("name='googlepagetype' content='Games'");
        // TODO: set proper google page id
        parent::addMetaTag("name='googlepageid' content=''");
        // TODO: set proper meta tags for facebook

        parent::addMetaTag("property='og:url' content='$url'");
        parent::addMetaTag("property='og:type' content='article'");
        parent::addMetaTag("property='og:title' content='Summer Olympic Games 2016 News'");
        parent::addMetaTag("property='og:description' content='Rio Olympic Games news can be found here.'");
        parent::addMetaTag("property='og:image' content='$fbImageUrl'");        
        parent::addMetaTag("property='og:image:width' content='400'");
        parent::addMetaTag("property='og:i=height' content='250'");
        // TODO: get facebook id
        parent::addMetaTag("property='fb:app_id' content='$fbId'");
    }


    public function read(string $id = "\0")
    {
        if($id == "\0" || $id == '')
        {
            $this->redirect("news");
        }
        else
        {
            if( strpos( $id, "_&_" ) !== true )
            {
                $id = explode("_&_",$id)[1];
            }

            $news = $this->model->getByID($id);
            if(!$news){
                $this->addErrorMessage("Can't find this page.");
                $this->redirect("news");
            }
            $this->news = $news;
            $this->comments = $this->commentModel->getNewsComments($id);
            if($this->isPost){
                $comment = $_POST['comment'];
                if(strlen($comment) == 0){
                    $this->addErrorMessage("You must enter same comment!");
                }
                else{
                    if($this->commentModel->addNewsComment($comment,$id,$_SESSION['userID'])){
                        $this->redirect("news", "read", array($id));
                    }
                }
            }
            $this->metaCalculation();
        }
    }

    public function create()
    {
        if($this->isRedactor) {
            if ($this->isPost) {
                $title = $_POST['title'];
                $body = $_POST['body'];

                if ($this->checkContent($title, $body) &&
                    $this->model->insert($title, $body, $_SESSION['userID'])
                ) {

                    $this->addInfoMessage('Successful creaate!');
                    $this->redirect("news");
                }
            }
        }
        else{
            $this->addErrorMessage("You must't be logged in as redacotr!!");
            $this->redirect("news");
        }
    }

    public function remove(int $id)
    {
        if($this->isRedactor || $this->isAdmin ) {
            $news = $this->model->getById($id);
            if ($this->isPost) {
                $title = $_POST['title'];
                if ($title === $news['title']) {
                    $this->commentModel->deleteNewsComments($id);   
                    if ($this->model->remove($id)) {
                        $this->addInfoMessage("Successful delete!!");
                        $this->redirect("news");
                    } else {
                        $this->addErrorMessage("Can't delete this publication.");

                        $this->redirect("news", "read", array($id));
                    }
                } else {
                    $this->addErrorMessage("Wrong title.");
                    $this->redirect("news", "read", array($id));
                }
            }
        }
        else{
            $this->addErrorMessage("You must't be logged in as redacotr!!");
            $this->redirect("news");
        }
    }

    public function edit(int $id)
    {
        if($this->isRedactor || $this->isAdmin) {
            $this->news = $this->model->getById($id);
            if ($this->isPost) {
                $title = $_POST['title'];
                $body = $_POST['body'];
                if ($this->checkContent($title, $body)
                    && $this->model->update($id, $title, $body)
                ) {

                    $this->addInfoMessage('Successful change!');
                    $this->redirect("news");
                }
            }
        }
        else{
            $this->addErrorMessage("You must't be logged in as redacotr!!");
            $this->redirect("news");
        }
    }

    private function checkContent($title,$body) : bool
    {
        $isCorect = 1;
        if(strlen($title) < 4){
            $this->addErrorMessage("Short title!");
            $isCorect = 0;
        }
        if(strlen($body) < 50){
            $this->addErrorMessage("Short content!");
            $isCorect = 0;
        }
        return $isCorect == 1;
    }

    protected function metaCalculation()
    {
        /**
         *  meta tags calculation
         */
        $url = APP_ROOT . "/news/read/".$this->news['title']."_&_".$this->news['id'];
        $image = findImage($this->news['body']);
        $fbImageUrl = APP_ROOT . "/image/show/article.jpeg";
        $fbImageWidth = 552;
        $fbImageHeight = 417;
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
        $title = $this->news['title'];
        $description = strip_tags(getDescription($this->news['body']));
        $keywords = array_keys(getKeywords(strip_tags($this->news['body'])));
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