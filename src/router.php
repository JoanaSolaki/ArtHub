<?php
require_once "config.php";

$route = $_SERVER['REQUEST_URI'];
//echo('<p>' . $route . '</p>');

$accueilPage = new AccueilController();

switch ($route) {
    case URL_ACCUEILPAGE:
        $accueilPage->index();
        break;
    
    default:
        $accueilPage->pageNotFound();
        break;
}

?>