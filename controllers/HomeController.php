<?php
/**
 * Created by PhpStorm.
 * User: Nikolay
 * Date: 8/2/2016
 * Time: 11:18 PM
 */


class HomeController extends BaseController
{
    protected $newsModel;
    protected $postsModel;
    protected $countriesModel;


    function __construct($controllerName, $actionName)
    {
        parent::__construct($controllerName, $actionName);
        $this->newsModel = new NewsModel();
        $this->postsModel = new ForumModel();
        $this->countriesModel = new CountriesModel();
        $this->metaTags = [];
    }

    function index()
    {
        $this->news = $this->newsModel->getLastNews(4);
        $this->posts = $this->postsModel->getLastPosts(4);
        $this->countries = $this->countriesModel->getCountries(4,"medalstotalDesc");

        $this->meta_keywords = "olympic, games, 2016, summer, olympic games, olympic games 2016, olympic sports, olympic air, olympic weightlifting, sport, history, olympic games 2016 history, forum, news, results, medals, result";

        $this->meta_description = " The 2016 Summer Olympics (Portuguese: Jogos Olímpicos de Verão de 2016),[a] officially known as the Games of the XXXI Olympiad and commonly known as Rio 2016, was a major international multi-sport event celebrated in Rio de Janeiro, Brazil, from 5 to 21 August 2016.This site contains history about Olympic Games for 2016, Rio. The information is not complete, this can be done form you too. To be part of this you just have to email us and we will review your application. There is forum section too. All of the information is free to be used";


        // $request_url = urldecode($_SERVER['REQUEST_URI']);
        // $url = "http://$_SERVER[HTTP_HOST]$request_url";
        $url = APP_ROOT;
        $fbImageUrl = APP_ROOT . "/image/show/rio-olympics.jpg";
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
        parent::addMetaTag("property='og:title' content='Summer Olympic Games 2016'");
        parent::addMetaTag("property='og:description' content='The 2016 Olympic games have ended but they never die. Here you can see the history and the results from the games. '");
        parent::addMetaTag("property='og:image' content='$fbImageUrl'");        
        parent::addMetaTag("property='og:image:width' content='400'");
        parent::addMetaTag("property='og:i=height' content='250'");
        // TODO: get facebook id
        parent::addMetaTag("property='fb:app_id' content='$fbId'");
    }
}