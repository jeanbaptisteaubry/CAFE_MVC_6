<?php

function Modele_CentreInteret_Select_Tous($bdd){
    $reqBDD = $bdd->query('SELECT * FROM centreinteret');
    $tableCentre = $reqBDD->fetchAll();
    return $tableCentre;
}

function Modele_Entreprise_Creer($bdd, $denominationSociale, $raisonSociale, $Adresse, $CP,
                          $Ville, $mailContact, $nomGerant, $prenomGerant, $dateNaissanceGerant,
                          $lieuNaissanceGerant, $departementNaissanceGerant):int
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
    if($etat == true){
        $idGerant = $bdd->lastInsertId();
        return $idGerant;
    }
    else
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

function Modele_Produit_SelectTous($bdd){
    $reqBDD = $bdd->query('
SELECT produit.*, categorie.nom as nom_categorie, categorie.description as description_categorie
FROM produit, categorie
where produit.idCategorie = categorie.id;');
    $tableProduit = $reqBDD->fetchAll(); //Je transforme le résultat de la requête en tableau [Ligne][Colonne]
    return $tableProduit;
}

function Modele_Produit_Selection_ParId($bdd,$idProduit)
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