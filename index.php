<?php
include_once "vendor/autoload.php";

use App\Utilitaire\Singleton_Logger;

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

Singleton_Logger::getInstance()->info("demande de : $case $action" );

/*
$bdd = new PDO('mysql:host=bdd.cafe.local;dbname=cafe2;charset=utf8',
    'bddcafe',
    'secret',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_SSL_CA=> 'C:\Users\JB\PhpstormProjects\CAFE_MVC_2\tls\ca-cert.pem')
    );
*/
$bdd = new PDO('mysql:host=127.0.0.1;dbname=cafe2;charset=utf8',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));

$bddLog = new PDO('mysql:host=127.0.0.1;dbname=cs_log;charset=utf8', 'user_insert', 'secret');
/*
 * c. Ajouter une info à $_SESSION["utilisateur"] pour savoir si l'utilisateur doit changer son mdp
 * Si c'est valide la seule route possible est $case="Accueil"
 * et $action = "actionChangerMotDePasseToken"
 *
 */
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