<?php
/**
 * User: Nikolay
 * Date: 2018-01-13 13:56:53
 */


class ImageController extends BaseController
{
    protected $imageUrl;
    protected $imageAlt;
    protected $imageSize;

    function __construct($controllerName, $actionName)
    {
        parent::__construct($controllerName, $actionName);
    }

    function index()
    {
        $this->redirect('home');   
    }

    function show(string $fileName)
    {
        $this->imageUrl = APP_ROOT . "/content/styles/images/". $fileName;
        $this->imageAlt = $this->imageUrl . " - url address of the image";
        $path = APP_ROOT_DIR ."/content/styles/images/".$fileName;
        $size = getimagesize($path);
        $this->imageSize = $size[3];
    }

    public function renderView(string $viewName = null, bool $includeLayout = true)
    {
        if (!$this->isViewRendered) {
            if ($viewName == null) {
                $viewName = $this->actionName;
            }
            $viewFileName = 'views/' . $this->controllerName . '/' . $viewName . '.php';
            include($viewFileName);
        }
    }
}