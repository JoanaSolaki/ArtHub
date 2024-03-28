<body>
    <div class="navbar flex">
        <a href="/" class="logo">ArtHub</a>
        <div class="flex">
            <?php //Vérifier si la session est vide dans "l'utilisateurId" vu que c'est là qu'est rangée l'id
                if (isset($_SESSION['utilisateurId'])) {
                    $id = $_SESSION ['utilisateurId'];
                    
                    $getUtilisateur = new UtilisateurRepository();

                    $utilisateur = $getUtilisateur->selectById($id);

                    echo '<a href="/profil">' . $utilisateur->getPrenom() . " " . $utilisateur->getNom() . '</a>';
                    echo '<a href="/deconnexion">Se deconnecter</a>';
                } else { //Sinon c'est le menu de base
                    echo '<a href="/sinscrire">S\'inscrire</a>
                    <a href="/seconnecter">Se connecter</a>';
                }
            ?>
        </div>
    </div>