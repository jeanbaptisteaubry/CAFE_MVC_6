<?php

include "./Vue/Vue_Structure_EnTete.php";
Vue_Structure_EnTete();
switch ($action) {
    case "VoirListe":
        include "./Vue/Vue_Menu.php";
        Vue_Menu();
        $tableProduit = Modele_Produit_SelectTous($bdd); //Je transforme le résultat de la requête en tableau [Ligne][Colonne]
        include "./Vue/Vue_ListeProduit.php";
        Vue_ListeProduit($tableProduit);
        break;
    case "AfficherProduit":
        include "./Vue/Vue_Menu.php";
        Vue_Menu();
        include "./Vue/Vue_AfficherProduit.php";
        $produit = Modele_Produit_Selection_ParId($bdd,  $_REQUEST["idProduit"]);
        $tableCategorie = Modele_Categorie_Selection_Tous($bdd);
        Vue_AfficherProduit($produit, $tableCategorie);
        break;
    case "MAJ_PRODUIT":
        Modele_Produit_MAJ($bdd, $_REQUEST["idProduit"], $_REQUEST["nom"], $_REQUEST["description"], $_REQUEST["PUHT"],
            $_REQUEST["TxTVA"], $_REQUEST["idCategorie"]);

        include "./Vue/Vue_Menu.php";
        Vue_Menu();
        include "./Vue/Vue_AfficherProduit.php";
        $produit = Modele_Produit_Selection_ParId($bdd,  $_REQUEST["idProduit"]);
        $tableCategorie = Modele_Categorie_Selection_Tous($bdd);
        Vue_AfficherProduit($produit, $tableCategorie);
        break;
    case "SupprimerProduit":
        Modele_Produit_Supprimer($bdd, $_REQUEST["idProduit"]);

        include "./Vue/Vue_Menu.php";
        Vue_Menu();
        $tableProduit = Modele_Produit_SelectTous($bdd); //Je transforme le résultat de la requête en tableau [Ligne][Colonne]
        include "./Vue/Vue_ListeProduit.php";
        Vue_ListeProduit($tableProduit);
        break;
        //case où on supprime une catégorie
        //case où on affiche une catégorie
        //case où on met à jour une catégorie...
    case "AjouterProduit":
        include "./Vue/Vue_Menu.php";
        Vue_Menu();
        include "./Vue/Vue_AjouterProduit.php";
        $tableCategorie = Modele_Categorie_Selection_Tous($bdd);
        Vue_AjouterProduit($tableCategorie);
        break;
    case "AjouterProduitBDD":
        Modele_Produit_Ajouer($bdd, $_REQUEST["Nom"], $_REQUEST["Description"], $_REQUEST["PUHT"],
            $_REQUEST["TxTva"], $_REQUEST["idCategorie"]);

        include "./Vue/Vue_Menu.php";
        Vue_Menu();
        $tableProduit = Modele_Produit_SelectTous($bdd);
        include "./Vue/Vue_ListeProduit.php";
        Vue_ListeProduit($tableProduit);
        break;

}