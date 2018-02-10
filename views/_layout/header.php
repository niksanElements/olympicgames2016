<!DOCTYPE html>
<html>
<head>
    <title>Olympic Games 2016</title>
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/styles/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/styles/layout.css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=APP_ROOT?>/content/semantic/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="<?=APP_ROOT?>/content/styles/css/fix-tinymce.css"/>

    <script src="<?=APP_ROOT?>/content/styles/js/jquery-3.1.0.min.js"></script>
    <script src="<?=APP_ROOT?>/content/semantic/semantic.min.js"></script>
    <script src="<?=APP_ROOT?>/content/styles/js/bootstrap.min.js"></script>
    <script src="<?=APP_ROOT?>/content/styles/js/blog-scripts.js"></script>
    <script type="application/ld+json">
        "name":"Olympic games 2016.",
        "description":"Learn something about Olympic Games 2016!",
        "author":null,
        "@type":"WebSite",
        "url":"{{ URL::to('/') }},
        "publisher":null,
        "mainEntityOfPage":null,
        "@context":"http://schema.org"
    </script>
    <!--
        meta rags
    -->
    <meta charset="utf-8"></meta>
    <?php foreach ($this->metaTags as $el): ?>
        <meta <?= $el ?> />
    <?php endforeach; ?>
    <style>
      .navbar-inverse {background-color: #EEE;}
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-default" style="box-shadow: 3px 3px 2px rgba(0,0,0,0.4)">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="navbar-brand">
            <h3><a title="Home" href="<?=APP_ROOT?>">
                    <img alt="Site brand" src="<?=APP_ROOT?>/content/styles/images/sprite.png" height="40" width="auto"></a>
            </h3>
        </div>
    </div>
        <div class="container-fluid collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
            <ul class="nav navbar-nav custom-hover" style="font-family: 'Roboto', sans-serif;font-size:1.2em;font-weight: 700;">
                <li class="text-center"><a title="Home" href="<?=APP_ROOT?>/">Home</a></li>
                <li class="text-center"><a title="News" href="<?=APP_ROOT?>/news/">News</a></li>
                <li class="dropdown text-center "><a title="Olympic Games Info" class="dropdown-toggle" data-toggle="dropdown"  href="#">Olympic Info</a>
                    <ul class="dropdown dropdown-menu">
                        <li class="special"><a title="Countries"  href="<?=APP_ROOT?>/countries/" >Countries</a></li>
                        <li class="special"><a title="Sports"  href="<?=APP_ROOT?>/sports/">Sports</a></li>
                        <li class="special"><a title="Athletes"  href="<?=APP_ROOT?>/athletes/">Athletes</a></li>
                        <li class="special"><a title="Venues" href="<?=APP_ROOT?>/venues/">Venues</a></li>
                    </ul>
                </li>

                <?php if($this->isLoggedIn): ?>
                    <li class="text-center"><a title="Account" href="<?=APP_ROOT?>/user/account">Account</a></li>
                <?php endif ?>
                <?php if($this->isAdmin): ?>
                    <li class="text-center"><a title="Admin Panel" href="<?=APP_ROOT?>/adminpanel/">Admin panel</a></li>
                <?php endif; ?>
                <li class="text-center"><a title="Forum" href="<?=APP_ROOT?>/forum/">Forum</a></li>
                <li class="last text-center"><a title="Contact Us" href="<?=APP_ROOT?>/contactus">Contact Us</a></li>
                <li class="dropdown text-center"><a title="Search" class="dropdown-toggle" data-toggle="dropdown"  href="#">
                        <span class="[ glyphicon glyphicon-search ]"></span></a>
                    <form action="<?=APP_ROOT?>/search" method="post" class="dropdown-menu search">
                        <div>
                        <input class="form-control" type="text" name="search" value="Search"
                               onfocus="this.value=(this.value=='Search')? '' : this.value ;" style="width:150px;" /><br />
                        <input type="checkbox" name="news" value="1" checked="checked" />News &nbsp;
                        <input type="checkbox" name="posts" value="1" checked="checked" />Forum<br />
                        <input type="submit" name="go" id="go" value="Search" />

                        </div>
                    </form>
                </li>
                <li>
                    <div>
                        <?php if(!$this->isLoggedIn): ?>
                            <ul class="list-group list-inline">
                                <li class="list-group-item-text"><a href="<?=APP_ROOT?>/user/login">
                                        <span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                                <li class="list-group-item-text"><a href="<?=APP_ROOT?>/user/registration">
                                        <span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                            </ul>
                        <?php else: ?>
                            <div>
                                <div class="text-center" >
                                    <p class="text-info">Hello, <b><?=htmlspecialchars($_SESSION['username'])?></b></p></div>
                                <div class="pull-right" >
                                    <a title="Logout" href="<?=APP_ROOT?>/user/logout" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-log-out">Logout</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
        </div>

        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <?php foreach($this->breadcrumbs as $breadcrumb): ?>
                <li class="breadcrumb-item"><a href="<?= $breadcrumb['href'] ?>"><?= $breadcrumb['name'] ?></a></li>
            <?php endforeach; ?>
        </ol>
    </nav>
</header>
<?php require_once('show-notify-messages.php'); ?>
<?php require_once('show-validation-errors.php'); ?>
