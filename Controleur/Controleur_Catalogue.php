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

        Vue_AfficherProduit($produit);
        break;
        //case où on supprime une catégorie
        //case où on affiche une catégorie
        //case où on met à jour une catégorie...


}