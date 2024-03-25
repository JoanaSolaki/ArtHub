<?php
require_once "config.php";

$route = $_SERVER['REQUEST_URI'];
$methode = $_SERVER['REQUEST_METHOD'];
//echo('<p>' . $route . '</p>');

$accueilPage = new AccueilController();
$sinscrirePage = new SinscrireController();
$utilisateurPage = new UtilisateurController();

switch ($route) {
    case URL_ACCUEILPAGE:
        $accueilPage->index();
        break;

    case URL_SINSCRIREPAGE:
        if ($methode == 'GET') {
            $sinscrirePage->index();
        } else {
            $sinscrirePage->sinscrire($_POST['nom'], $_POST['prenom'], $_POST['mdp'], $_POST['mail']);
        }
        break;
    
        case URL_PROFILPAGE:
            $utilisateurPage->index();
            break;    

    default:
        $accueilPage->pageNotFound();
        break;
}
?>