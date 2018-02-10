<?php

ini_set('display_errors',1);
error_reporting(E_ALL);
require_once('config.php');
require_once('functions.php');
session_start();
$requestParsed = parseRequest();
# var_dump("$requestParsed");
processRequest($requestParsed);
