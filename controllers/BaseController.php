<?php

abstract class BaseController
{
    protected $controllerName;
    protected $actionName;
    protected $isViewRendered = false;
    protected $isPost = false;
    protected $isLoggedIn = false;
    protected $isAdmin = false;
    protected $isRedactor = false;
    protected $title = "";
    protected $model;
    protected $validationErrors = [];
    protected $metaTags = [];
    protected $breadcrumbs = [];

    function __construct(string $controllerName, string $actionName)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->isPost = true;
        }

        $this->isLoggedIn = isset($_SESSION['userID']);
        $this->isAdmin = $_SESSION['admin'] ?? false;
        $this->isRedactor = $_SESSION['redactor'] ?? false;

        // Load the default model class for the current controller
        $modelClassName = ucfirst(strtolower($controllerName)) . 'Model';
        if (class_exists($modelClassName)) {
            $this->model = new $modelClassName();
        }

        $this->onInit();
    }

    public function onInit()
    {
        // Implement initializing logic in the subclasses
        $this->calculateBreadcrumb();
    }

    public function index()
    {
        // Implement the default action in the subclasses
    }

    public function renderView(string $viewName = null, bool $includeLayout = true)
    {
        if (!$this->isViewRendered) {
            ob_start();
            if ($viewName == null) {
                $viewName = $this->actionName;
            }
            $viewFileName = 'views/' . $this->controllerName . '/' . $viewName . '.php';
            include($viewFileName);
            $htmlFromView = ob_get_contents();

            ob_end_clean();
            if ($includeLayout) {
                include('views/_layout/header.php');
            }
            echo $htmlFromView;
            if ($includeLayout) {
                include('views/_layout/footer.php');
            }
            $this->isViewRendered = true;
        }
    }

    public function redirectToUrl(string $url)
    {
        header("Location: " . $url);
        die;
    }

    public function redirect(
        string $controllerName, string $actionName = null, array $params = null)
    {
        $url = APP_ROOT . '/' . urlencode($controllerName);
        if ($actionName != null) {
            $url .= '/' . urlencode($actionName);
        }
        if ($params != null) {
            $encodedParams = array_map('urlencode',$params);
            if(count($params) == 1){
                $url.= '/'.$encodedParams[0];
            }
            else {
                $url .= implode('/', $encodedParams);
            }
        }
        $this->redirectToUrl($url);
    }

    public function authorize() {
        if (! $this->isLoggedIn) {
            $this->addErrorMessage("Please login first.");
            $this->redirect("user", "login");
        }
    }

    public function authorizeAdmin() {
      if(!$this->isAdmin) {
        $this->addErrorMessage("Access denied!");
        $this->redirect("home", "index");
      }
    }

    function addMessage(string $msg, string $type)
    {
        if (!isset($_SESSION['messages'])) {
            $_SESSION['messages'] = array();
        };
        array_push($_SESSION['messages'],
            array('text' => $msg, 'type' => $type));
    }

    function addInfoMessage(string $infoMsg)
    {
        $this->addMessage($infoMsg, 'info');
    }

    function addErrorMessage(string $errorMsg)
    {
        $this->addMessage($errorMsg, 'error');
    }

    function setValidationError(string $fieldName, string $errorMsg)
    {
        $this->validationErrors[$fieldName] = $errorMsg;
    }

    function formValid() : bool
    {
        return count($this->validationErrors) == 0;
    }

    protected function metaCalculation()
    {
        // TODO: insert some basic implementation
    }

    protected function addMetaTag(string $attr)
    {
        array_push($this->metaTags,$attr);
    }

    private function calculateBreadcrumb()
    {
        $url = urldecode($_SERVER['REQUEST_URI']);
        $url = explode("/", $url);
        $currentUrl = APP_ROOT . "/";

        array_push($this->breadcrumbs,["name"=>"home","href"=>$currentUrl]);

        foreach($url as $item):
            $name = $item;
            if( strpos( $item, "_&_" ) == true )
            {
                $name = explode("_&_",$item)[0];
            }

            if($item != "" && $item != "home" && $item != "search")
            {
                $currentUrl = $currentUrl . $item . "/";
                array_push($this->breadcrumbs,["name"=>"$name","href"=>$currentUrl]);
            }
        endforeach;
    }
}
