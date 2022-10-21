<?php
function Vue_ListeProduit($tableProduit)
{
    echo "<H1>Liste des produits</H1>";
//Etablissement de la connexion à la base de données

//table => Les résultats de la requête sous la forme d'un tableau de tableau : tableau [Ligne][Colonne]
//$count($table) => $count du nombre d'entrée dans $table[] donc le nombre de lignes !!
//En sachant que la première ligne commence à 0 !
    echo "<table border='1'>
    <th>Nom </th>
    <th>Description</th>
    <th>P.U HT</th>
    <th>Taux de TVA</th>
    <th>Catégorie</th>";
    if (count($tableProduit) > 0) {
        // On affiche chaque entrée une à une :
        foreach ($tableProduit as $enregProduit) {
            echo "<tr>
        <td>$enregProduit[nom] </td>
        <td>$enregProduit[description]</td>
        <td>$enregProduit[PUHT]</td>
        <td>$enregProduit[TxTVA]</td>
        <td>$enregProduit[nom_categorie]</td>
        <td>
            <form>
                <input type='hidden' name='case' value='Catalogue'>
                <input type='hidden' name='idProduit' value='$enregProduit[id]'>
                <button type='submit' name='action' value='AfficherProduit'>Ouvrir</button>
            </form>
        </td>
        <td>
            <form>
                <input type='hidden' name='case' value='Catalogue'>
                <input type='hidden' name='idProduit' value='$enregProduit[id]'>
                <button type='submit' name='action' value='SupprimerProduit'>Supprimer</button>
            </form>
        </td>

        "; // Pour chaque entrée, j'affiche la dénominiation dans un lien ouvrant la liste des informations de l'entreprise
            echo "<tr>";
        }


    } else {
        echo " Pas encore d'enregistrement ";
    }

    echo "
        <tr>
        
            <td colspan='7' style='text-align: center'>
                <form>
                    <input type='hidden' name='case' value='Catalogue'>
                    <button type='submit' name='action' value='AjouterProduit'>Ajouter un produit</button>
                </form>
             </td>
        </tr> 
</table>";
}