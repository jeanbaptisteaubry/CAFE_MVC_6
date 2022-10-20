<?php

include "./Vue/Vue_Structure_EnTete.php";
Vue_Structure_EnTete();
switch ($action) {
    case "VoirListe":
        include "./Vue/Vue_Menu.php";
        Vue_Menu();
        //Chercher la liste des catégories
        //AFficher dans une vue la liste des catégorie
        break;
        //case où on supprime une catégorie
        //case où on affiche une catégorie
        //case où on met à jour une catégorie...


}