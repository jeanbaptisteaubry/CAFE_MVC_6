<?php

include "./Vue/Vue_Structure_EnTete.php";
Vue_Structure_EnTete();
switch ($action) {
    case "ActionParDefaut": //Accueil et action par défaut : afficher une vue !!
        include "./Vue/Vue_Accueil.php";
        Vue_Afficher_Accueil();
        break;
    case "SInscrire":
        include "./Vue/Vue_SInscrire.php";
        $tableCentreDInteret = Modele_CentreInteret_Select_Tous($bdd);
        Vue_SInscrire($tableCentreDInteret);
        break;
    case "SeConnecter":
        include "./Vue/Vue_Menu.php";
        Vue_Menu();

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
            $prenomGerant = $_REQUEST["prenomGerant"];
            $dateNaissanceGerant = $_REQUEST["dateNaissanceGerant"];
            $lieuNaissanceGerant = $_REQUEST["lieuNaissanceGerant"];
            $departementNaissanceGerant = $_REQUEST["departementNaissanceGerant"];

            $idGerant = Modele_Entreprise_Creer($bdd, $denominationSociale, $raisonSociale, $Adresse, $CP,
                $Ville, $mailContact, $nomGerant, $prenomGerant, $dateNaissanceGerant,
                $lieuNaissanceGerant, $departementNaissanceGerant);

            if ($idGerant) {
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