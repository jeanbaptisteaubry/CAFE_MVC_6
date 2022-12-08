<?php

function Modele_CentreInteret_Select_Tous($bdd)
{
    $reqBDD = $bdd->query('SELECT * FROM centreinteret');
    $tableCentre = $reqBDD->fetchAll();
    return $tableCentre;
}

function Modele_Entreprise_Creer($bdd, $denominationSociale, $raisonSociale, $Adresse, $CP,
                                 $Ville, $mailContact, $nomGerant, $prenomGerant, $dateNaissanceGerant,
                                 $lieuNaissanceGerant, $departementNaissanceGerant): int
{

    $reqTxt = "
    INSERT INTO `entreprise`(`denominationSociale`, `raisonSociale`, `Adresse`, `CP`, `Ville`, `mailContact`, `nomGerant`, `prenomGerant`, `dateNaissanceGerant`, `lieuNaissanceGerant`, `departement`, `dateAcceptationRGPD`) 
    VALUES (                :denominationSociale, :raisonSociale,      :Adresse, :CP, :Ville, :mailContact, 
            :nomGerant, :prenomGerant   ,:dateNaissanceGerant , :lieuNaissanceGerant, :departement      ,:dateAcceptationRGPD)";

//Préparation de la requête
//=> Association d'une variable à chaque paramètre de la requête
//Paramètre d'une requête ? champ changeant de valeur pour pas que la requête soit toujours identique
    $reqBDD = $bdd->prepare($reqTxt);
    $dateAcceptationRGPD = date('Y-m-d H:i:s');
    $etat = $reqBDD->execute(array(
        'denominationSociale' => $denominationSociale,
        'raisonSociale' => $raisonSociale,
        'Adresse' => $Adresse,
        'CP' => $CP,
        'Ville' => $Ville,
        'mailContact' => $mailContact,
        'nomGerant' => $nomGerant,
        'prenomGerant' => $prenomGerant,
        'dateNaissanceGerant' => $dateNaissanceGerant,
        'lieuNaissanceGerant' => $lieuNaissanceGerant,
        'departement' => $departementNaissanceGerant,
        'dateAcceptationRGPD' => $dateAcceptationRGPD,
    ));
    if ($etat == true) {
        $idGerant = $bdd->lastInsertId();
        return $idGerant;
    } else
        return false;
}

function Modele_AvoirCentreInteret_Ajouter($bdd, $centre, $idGerant)
{
    $reqTxt = "INSERT INTO `avoir_centreinteret`(`idCI`, `idEntreprise`) 
            VALUES (:idCI, :idEntreprise)";
//Préparation de la requête
//=> Association d'une variable à chaque paramètre de la requête
//Paramètre d'une requête ? champ changeant de valeur pour pas que la requête soit toujours identique
    $reqBDD = $bdd->prepare($reqTxt);
    $etat = $reqBDD->execute(array(
        'idCI' => $centre,
        'idEntreprise' => $idGerant,
    ));
}

function Modele_Produit_SelectTous($bdd)
{
    $reqBDD = $bdd->query('
SELECT produit.*, categorie.nom as nom_categorie, categorie.description as description_categorie
FROM produit, categorie
where produit.idCategorie = categorie.id;');
    $tableProduit = $reqBDD->fetchAll(); //Je transforme le résultat de la requête en tableau [Ligne][Colonne]
    return $tableProduit;
}

function Modele_Produit_Selection_ParId($bdd, $idProduit)
{

    $reqTxt = "
SELECT produit.*, categorie.nom as nom_categorie,
       categorie.description as description_categorie
FROM produit, categorie
where produit.idCategorie = categorie.id
and produit.id = :id ";

//Paramétrage de la requête
    $reqBDD = $bdd->prepare($reqTxt);
    $etat = $reqBDD->execute(array(
        'id' => $idProduit,
    ));
    $table = $reqBDD->fetchAll();

//Affichage des informations relatives à cette entreprise
    $produit = $table[0];
    return $produit;
}

function Modele_Categorie_Selection_Tous($bdd)
{
    //Interrogation de la base de donnée
    $reqBDD = $bdd->query('SELECT * FROM `categorie` ');
    $tableCategorie = $reqBDD->fetchAll();
    return $tableCategorie;
}

function Modele_Produit_MAJ($bdd, $idProduit, $nom, $description, $PUHT, $TxTVA, $idCategorie)
{

    $reqTxt = "
        UPDATE `produit`
        SET `nom`= :nom,
            `description`=:description,
            `PUHT`=:PUHT,
            `TxTVA`=:TxTVA,
            `idCategorie`=:idCategorie
        WHERE id = :idProduit
        "; //`idCategorie`=:idCategorie

    $reqBDD = $bdd->prepare($reqTxt);

    $etat = $reqBDD->execute(array(
        'idProduit' => $idProduit,
        'nom' => $nom,
        'description' => $description,
        'PUHT' => $PUHT,
        'TxTVA' => $TxTVA,
        'idCategorie' => $idCategorie,
    ));
}

function Modele_Produit_Supprimer($bdd, $idProduit)
{

//Génération d'une requête SQL
    $reqTxt = "DELETE produit.* FROM produit where id = :id";

//Préparation de la requête
//=> Association d'une variable à chaque paramètre de la requête
//Paramètre d'une requête ? champ changeant de valeur pour pas que la requête soit toujours identique
    $reqBDD = $bdd->prepare($reqTxt);
    $etat = $reqBDD->execute(array(
        'id' => $idProduit,
    ));
}

function Modele_Produit_Ajouer($bdd, $Nom, $Description, $PUHT, $TxTva, $idCategorie)
{
    $reqTxt = "
INSERT INTO `produit`
    (`nom`, `description`, `PUHT`, `TxTVA`, `idCategorie`) 
VALUES (:nom, :description, :PUHT, :TxTVA, :idCategorie)
    ";
    $reqBDD = $bdd->prepare($reqTxt);
    $etat = $reqBDD->execute(array(
        "nom" => $Nom,
        "description" => $Description,
        "PUHT" => $PUHT,
        "TxTVA" => $TxTva,
        "idCategorie" => $idCategorie,
    ));
}
function Modele_Utilisateur_ChangerMdp($bdd, $idUtilisateur, $motDePasseClair){
    $reqTxt  = "UPDATE `utilisateur`
                SET `motDePasse` = :paramMotDePasse
                WHERE id = :paramId";

    $reqBDD = $bdd->prepare($reqTxt);
    $motDePasseHashe = password_hash($motDePasseClair, PASSWORD_DEFAULT);
    $etat = $reqBDD->execute(array(
        "paramId" => $idUtilisateur,
        "paramMotDePasse" => $motDePasseHashe
    ));

    return $etat;
}
function Modele_Utilisateur_Creer($bdd, $mail, $motDePasseClair, $typeUtilisateur)
{
    $reqTxt = "
INSERT INTO `utilisateur`( `mail`, `motDePasse`, `typeUtilisateur`) 
VALUES ( :mail,:motDePasse,:typeUtilisateur)
    ";
    $reqBDD = $bdd->prepare($reqTxt);
    $motDePasseHashe = password_hash($motDePasseClair, PASSWORD_DEFAULT);
    $etat = $reqBDD->execute(array(
        "mail" => $mail,
        "motDePasse" => $motDePasseHashe,
        "typeUtilisateur" => $typeUtilisateur,
    ));
    if ($etat == true) {
        $idUtilisateur = $bdd->lastInsertId();
        return $idUtilisateur;
    } else
        return false;
}


function Modele_Utilisateur_SelectionnerParId($bdd, $id)
{
    $reqTxt = "
SELECT * 
from utilisateur
where id = :id ";

//Paramétrage de la requête
    $reqBDD = $bdd->prepare($reqTxt);
    $etat = $reqBDD->execute(array(
        'id' => $id,
    ));
    $table = $reqBDD->fetchAll();
    if (is_array($table)) {
        if (count($table) > 0) {
//Affichage des informations relatives à cette entreprise
            $utilisateur = $table[0];
            return $utilisateur;
        }
    }

    return false;
}

function Modele_Utilisateur_SelectionnerParMail($bdd, $mail)
{
    $reqTxt = "
SELECT * 
from utilisateur
where mail = :mail ";

//Paramétrage de la requête
    $reqBDD = $bdd->prepare($reqTxt);
    $etat = $reqBDD->execute(array(
        'mail' => $mail,
    ));
    $table = $reqBDD->fetchAll();
    if (is_array($table)) {
        if (count($table) > 0) {
//Affichage des informations relatives à cette entreprise
            $utilisateur = $table[0];
            return $utilisateur;
        }
    }

    return false;
}

function Modele_Jeton_Creation($bdd, $valeurUnique, $idUtilisateur, $idUsage, $idObjet = -1)
{
    $reqTxt = "
INSERT INTO `jeton`(  `valeurUnique`, `idUtilisateur`, `idUsage`, `idObjet`) 
VALUES ( :valeurUnique,:idUtilisateur,:idUsage,:idObjet)
    ";
    $reqBDD = $bdd->prepare($reqTxt);

    $etat = $reqBDD->execute(array(
        "valeurUnique" => $valeurUnique,
        "idUtilisateur" => $idUtilisateur,
        "idUsage" => $idUsage,
        "idObjet" => $idObjet,
    ));
    if ($etat == true) {
        $idJeton = $bdd->lastInsertId();
        return $idJeton;
    } else
        return false;
}

function Modele_Jeton_Recherche($bdd, $valeurUnique)
{
    $reqTxt = "
SELECT * 
from jeton
where valeurUnique = :valeurUnique ";

//Paramétrage de la requête
    $reqBDD = $bdd->prepare($reqTxt);
    $etat = $reqBDD->execute(array(
        'valeurUnique' => $valeurUnique,
    ));
    $table = $reqBDD->fetchAll();
    if (is_array($table)) {
        if (count($table) > 0) {
//Affichage des informations relatives à cette entreprise
            $jeton = $table[0];
            return $jeton;
        }
    }

    return false;
}

function Modele_Jeton_Supprimer($bdd, $idJeton)
{
    $reqTxt = "
delete jeton.* 
from jeton
where id = :idJeton ";

//Paramétrage de la requête
    $reqBDD = $bdd->prepare($reqTxt);
    $etat = $reqBDD->execute(array(
        'idJeton' => $idJeton,
    ));
    return $etat;
}