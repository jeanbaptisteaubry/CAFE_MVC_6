<?php
include_once "vendor/autoload.php";
include_once "Modele/Modele.php";
$bdd = new PDO('mysql:host=127.0.0.1;dbname=cafe2;charset=utf8', 'root', '');

$octetsAleatoires = openssl_random_pseudo_bytes (256) ;
$valeurUnique = sodium_bin2base64($octetsAleatoires, SODIUM_BASE64_VARIANT_ORIGINAL);

$utilisateur = $utilisateur = Modele_Utilisateur_SelectionnerParMail($bdd, "JBA@CLIENT.fr");
$idJeton = Modele_Jeton_Creation($bdd, $valeurUnique, $utilisateur["id"], 1 );

if($idJeton == false)
{
    die ("erreur création jeton");
}

$jetonRecherche = Modele_Jeton_Recherche($bdd, $valeurUnique);
if($jetonRecherche["valeurUnique"] != $valeurUnique)
{
    die ("erreur recherche jeton");
}

if($jetonRecherche["id"] != $idJeton)
{
    die ("erreur recherche jeton clé primaire");
}

$resultSuppression = Modele_Jeton_Supprimer($bdd,$idJeton);
if($resultSuppression == false)
{
    die ("erreur suppression jeton");
}

$jetonRechercheSupp = Modele_Jeton_Recherche($bdd, $valeurUnique);
if($jetonRechercheSupp != false)
{
    die ("erreur recherche jeton supprimé");
}
echo "Ok, tout fonctionne";