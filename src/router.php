<?php
require_once "config.php";

$route = $_SERVER['REQUEST_URI'];
$methode = $_SERVER['REQUEST_METHOD'];
//echo('<p>' . $route . '</p>');

$accueilPage = new AccueilController();
$sinscrirePage = new SinscrireController();
$connexionPage = new ConnexionController();
$utilisateurPage = new UtilisateurController();
$reservationPage = new ProfesseursController();
$modifierPage = new ModifierController();

switch ($route) {
    case URL_ACCUEILPAGE: //Page d'accueil
        $accueilPage->index();
        break;

    case URL_SINSCRIREPAGE: //Page d'inscription
        if ($methode == 'GET') {
            $sinscrirePage->index();
        } else {
            $sinscrirePage->sinscrire($_POST['nom'], $_POST['prenom'], $_POST['mdp'], $_POST['mail']);
        }
        break;

    case URL_MODIFICATIONPAGE: //Page de modification
        if ($methode == 'GET') {
            $modifierPage->index();
        } 
        if ($methode == 'POST') {
            $modifierPage->modifier($_POST['nom'], $_POST['prenom'], $_POST['mdp'], $_POST['mail'], $_SESSION['utilisateurId']);
        }
        break;

    case URL_CONNEXIONPAGE: //Page de connexion
        if ($methode == 'GET') {
            $connexionPage->index();
        } 
        if ($methode == 'POST') {
            $connexionPage->connexion($_POST['mail'], $_POST['mdp']);
        }
        break;

    case URL_PROFILPAGE: //Page utilisateur
        $utilisateurPage->index();
        break;    

    case URL_RESERVATIONPAGE: //Page utilisateur
        $reservationPage->index();
        break;    

    case URL_DECONNEXION: //Page logout
        $accueilPage->deconnexion();
        break;    

    case URL_SUPPRIMERDEMANDE: //Demande de suppression de compte
        $utilisateurPage->supprimer();
        break;    

    case URL_SUPPRIMER: //Supprimer le compte
        $utilisateurPage->delete();
        break;    

    default: //404
        $accueilPage->pageNotFound();
        break;
}
?>