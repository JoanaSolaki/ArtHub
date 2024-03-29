<?php
require_once "config.php";

$route = $_SERVER['REQUEST_URI'];
$methode = $_SERVER['REQUEST_METHOD'];
//echo('<p>' . $route . '</p>');

$accueilPage = new AccueilController();
$utilisateurPage = new UtilisateurController();
$reservationPage = new ProfesseursController();
$reservationCRUDPage = new ReservationController();

switch ($route) {
    case URL_ACCUEILPAGE: //Page d'accueil
        $accueilPage->index();
        break;

    case URL_SINSCRIREPAGE: //Page d'inscription
        if ($methode == 'GET') {
            $utilisateurPage->indexSinscrire();
        } 
        if ($methode == 'POST') {
            $utilisateurPage->sinscrire($_POST['nom'], $_POST['prenom'], $_POST['mdp'], $_POST['mail']);
        }
        break;

    case URL_MODIFICATIONPAGE: //Page de modification
        if ($methode == 'GET') {
            $utilisateurPage->indexModifier();
        } 
        if ($methode == 'POST') {
            $utilisateurPage->modifier($_POST['nom'], $_POST['prenom'], $_POST['mdp'], $_POST['mail'], $_SESSION['utilisateurId']);
        }
        break;

    case URL_CONNEXIONPAGE: //Page de connexion
        if ($methode == 'GET') {
            $utilisateurPage->indexConnexion();
        } 
        if ($methode == 'POST') {
            $utilisateurPage->connexion($_POST['mail'], $_POST['mdp']);
        }
        break;

    case URL_PROFILPAGE: //Page utilisateur
        $utilisateurPage->index();
        break;    

    case URL_RESERVATIONPAGE: //Page reservation
        if ($methode == 'GET') { 
            $reservationPage->index();
        }
        if ($methode == 'POST') {
            $reservationPage->reserver($_POST['date'], $_POST['heure'],$_SESSION['utilisateurId'], $_POST['professeur'], $_POST['salle'], $_POST['cours']);
        }
        break;    

    case (str_contains($route, URL_MODIFICATIONRESERVATION) ? true : false): //Page modification de reservation
        if ($methode == 'GET') { 
            $reservationCRUDPage->indexModifier();
        }
        if ($methode == 'POST') {
            $reservationCRUDPage->modifier($_POST['date'], $_POST['heure'],$_SESSION['utilisateurId'], $_POST['professeur'], $_POST['salle'], 
            $_GET['id']);
        }
        break;    
        
    case (str_contains($route, URL_SUPPRIMERRESERVATION) ? true : false) : //Supprimer la reservation
        $reservationCRUDPage->delete();
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