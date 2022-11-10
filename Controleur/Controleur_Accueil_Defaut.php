<?php

include "./Vue/Vue_Structure_EnTete.php";
Vue_Structure_EnTete();
switch ($action) {
    case "seDeconnecter":
        $_SESSION = null;
        unset($_SESSION);
        include "./Vue/Vue_Accueil.php";
        Vue_Afficher_Accueil();
        break;
    case "ActionParDefaut": //Accueil et action par défaut : afficher une vue !!
        if(isset($_SESSION["utilisateur"]))
        {
            include "./Vue/Vue_Menu.php";
            Vue_Menu();
            include "./Vue/Vue_Accueil_Connecte.php";
            Vue_Accueil_Connecte($_SESSION["utilisateur"]["mail"]);
        }
        else {
            include "./Vue/Vue_Accueil.php";
            Vue_Afficher_Accueil();//formulaire où on peut se connecter !!

        }break;
    case "SInscrire":
        include "./Vue/Vue_SInscrire.php";
        $tableCentreDInteret = Modele_CentreInteret_Select_Tous($bdd);
        Vue_SInscrire($tableCentreDInteret);
        break;
    case "SeConnecter":
        include "./Vue/Vue_Connexion.php";
        Vue_Connexion();

        break;
    case "login":
        //Il va falloir que le modèle nous dise, si le mot de passe est bon !
        $utilisateur = Modele_Utilisateur_SelectionnerParMail($bdd, $_REQUEST["email"]);
        if( $utilisateur != false)
        {
            //Utilisateur connu, on va checke si le mdp est bon !!!
            if(password_verify($_REQUEST["motDePasse"], $utilisateur["motDePasse"]))
            {
                //on stocke l'utilisateur en session
                $_SESSION["utilisateur"] = $utilisateur;
                unset($_SESSION["utilisateur"]["motDePAsse"]); //on détruit le mot de passe hashé en mémoire
                // => sécurité

                //Le mot de passe en clair correspond au mot de passe hashé !!
                include "./Vue/Vue_Menu.php";
                Vue_Menu();
                include "./Vue/Vue_Accueil_Connecte.php";
                Vue_Accueil_Connecte($utilisateur["mail"]);
            }
            else
            {
                //Mot de passe inconnu !!!
                include "./Vue/Vue_Connexion.php";
                Vue_Connexion();
            }
        }
        else
        {
            //Mot de passe inconnu !!!
            include "./Vue/Vue_Connexion.php";
            Vue_Connexion();
        }
        break;
    case "EnvoyerInscription":
        if (isset($_REQUEST["RGPD"])) {
//Association d'une variable PHP à chaque variable issue de la demande (REQUEST) Http
            $denominationSociale = $_REQUEST["denominationSociale"];
            $raisonSociale = $_REQUEST["raisonSociale"];
            $Adresse = $_REQUEST["Adresse"];
            $CP = $_REQUEST["CP"];
            $Ville = $_REQUEST["Ville"];
            $mailContact = $_REQUEST["mailContact"];
            $nomGerant = $_REQUEST["nomGerant"];
            $motDePasseClair = $_REQUEST["motDePasse"];
            $prenomGerant = $_REQUEST["prenomGerant"];
            $dateNaissanceGerant = $_REQUEST["dateNaissanceGerant"];
            $lieuNaissanceGerant = $_REQUEST["lieuNaissanceGerant"];
            $departementNaissanceGerant = $_REQUEST["departementNaissanceGerant"];

            $idGerant = Modele_Entreprise_Creer($bdd, $denominationSociale, $raisonSociale, $Adresse, $CP,
                $Ville, $mailContact, $nomGerant, $prenomGerant, $dateNaissanceGerant,
                $lieuNaissanceGerant, $departementNaissanceGerant);

            if ($idGerant) {
                Modele_Utilisateur_Creer($bdd, $mailContact, $motDePasseClair, 1);
                //Parcours des centres d'intérêts
                if (isset($_REQUEST["centre"])) {
                    foreach ($_REQUEST["centre"] as $centre) {
                        Modele_AvoirCentreInteret_Ajouter($bdd, $centre, $idGerant);
                    }
                }

                include "./Vue/Vue_Menu.php";
                Vue_Menu();
                include "./Vue/Vue_Accueil.php";
                Vue_Afficher_Accueil();
                include "./Vue/Vue_Remercier.php";
                Vue_Remercier($mailContact);


            } else {
                //   echo 'archtung !!';
            }
        } else {
            include "./Vue/Vue_SInscrire.php";
            $tableCentreDInteret = Modele_CentreInteret_Select_Tous($bdd);
            Vue_SInscrire($tableCentreDInteret, 'RGPD pas acceptée !');
        }
        break;
}

include "./Vue/Vue_Structure_BasDePage.php";
Vue_Structure_BasDePage();