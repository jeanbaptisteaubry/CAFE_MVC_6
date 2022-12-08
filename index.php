<?php
include_once "vendor/autoload.php";
session_start();

include "./Modele/Modele.php";

if(isset($_REQUEST["case"]))
{
    $case = $_REQUEST["case"];
}
else
{
    $case = "CasParDefaut";
}

if(isset($_REQUEST["action"]))
{
    $action = $_REQUEST["action"];
}
else
{
    $action = "ActionParDefaut";
}

$bdd = new PDO('mysql:host=127.0.0.1;dbname=cafe2;charset=utf8', 'root', '');

switch($case){
    case "CasParDefaut":
    case "Accueil":
        include "Controleur/Controleur_Accueil_Defaut.php";
        break;
    case "Catalogue":
        include "Controleur/Controleur_Catalogue.php";
        break;
    case "Categories":
        include "Controleur/Controleur_Categories.php";
        break;
}