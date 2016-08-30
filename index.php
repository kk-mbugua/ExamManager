<?php
//functionts to help manage pages
session_start();
ob_start();


//includes needed to acces database, pages and regularly used functions.
include 'app/conn_db.php';
include 'app/pages.php';
include 'app/functions.php';


//decaration and definitions of needed varibles
define('ROOT', dirname(__DIR__));
$logged_in      = empty($_SESSION['user_id']) ? NULL : 1; // determines if user has access to exam manager
$permission     = empty($_SESSION["admin"]) ? NULL : $_SESSION["admin"]; //he user can access on the site
$first_login    = empty($_SESSION["first_login"]) ? NULL : $_SESSION["first_login"]; // determines if user has loged in for the first time
$page           = empty(get_input('page')) ?  'home' : get_input('page'); // the name of the page to access


//for logout and session expiry (in minutes)
if ($page == "logout" || expired(45)) {
    $_SESSION = array();
    session_destroy();
    redirect_to();
}


//include the header and navigation parts of the page
require 'templates/header.php';  
require 'templates/navigation.php';


//check if user is logged in
if (!isset($logged_in) || $logged_in != 1) {
    $page = 'login';
}

//check if the user has made a first login attempt
if ($logged_in == 1 && $first_login != 1) {
    $page = 'first_login';
}


//load the page
switch ($permission) {
    case 0:
        require go_to_user($page);
        break;
    
    case 1:
        require go_to_admin($page);
        break;
    
    default :
        require go_to_all($page);
        break;
}

ob_end_flush(); //clean the output buffer
?>