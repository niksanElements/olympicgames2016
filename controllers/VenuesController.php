<?php


class VenuesController extends BaseController
{

    public function __construct($controllerName,$action)
    {
        parent::__construct($controllerName,$action);
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
        $this->venues = $this->model->getVenues();
    }
}