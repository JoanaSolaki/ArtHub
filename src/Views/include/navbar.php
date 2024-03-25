<body>
    <div class="navbar">
        <a href="/" class="logo">ArtHub</a>
        <div>
            <?php //Vérifier si la session est vide dans "l'utilisateurId" vu que c'est là qu'est rangée l'id
                if (isset($_SESSION['utilisateurId'])) {
                    $id = $_SESSION ['utilisateurId'];
                    
                    $getUtilisateur = new UtilisateurRepository();

                    $utilisateur = $getUtilisateur->selectById($id);

                    echo '<p>' . $utilisateur->getPrenom() . $utilisateur->getNom() . '</p>';
                    echo '<a href="/deconnexion">Se deconnecter</a>';
                } else { //Sinon c'est le menu de base
                    echo '<a href="/sinscrire">S\'inscrire</a>
                    <a href="/seconnecter">Se connecter</a>';
                }
            ?>
        </div>
    </div>