<?php
function Vue_AfficherProduit($produit)
{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=cafe2;charset=utf8', 'root', '');

//Création de la requête paramétrée


    echo "       <form>
       <input type='hidden' name='idProduit' value='$produit[id]'>
             <table>
   <tr>     <td>Nom</td>        <td><input type='text' value='$produit[nom]' name='nom'> </td></tr>
    <tr>   <td>Description</td> <td><input type='text' value='$produit[description]' name='description'></td></tr>
     <tr>   <td>P.U. H.T.</td>  <td><input type='text' value='$produit[PUHT]' name='PUHT'></td></tr>
     <tr>    <td>Taux TVA</td>  <td>
     
     <select name='TxTVA'>";
    if($produit["TxTVA"] == 0.021 )
        echo "<option value='0.021' selected>2,1%</option>";
    else
        echo "<option value='0.021' >2,1%</option>";

    if($produit["TxTVA"] == 0.055 )
        echo "<option value='0.055' selected>5,5%</option>";
    else
        echo "<option value='0.055' >5,5%</option>";

    if($produit["TxTVA"] == 0.1 )
        echo "<option value='0.1' selected>10%</option>";
    else
        echo "<option value='0.2' >10%</option>";

    if($produit["TxTVA"] == 0.2 )
        echo "<option value='0.2' selected>20%</option>";
    else
        echo "<option value='0.2' >20%</option>";

    echo "</select>
    
     $produit[TxTVA] 
     
     
     </td></tr>
      <tr>    <td>Catégorie</td>
      
      <td>$produit[nom_categorie]
      <select name='idCategorie'>";

    $bdd = new PDO('mysql:host=127.0.0.1;dbname=cafe2;charset=utf8', 'root', '');

    //Interrogation de la base de donnée
    $reqBDD = $bdd->query('SELECT * FROM `categorie` ');
    $tableCategorie = $reqBDD->fetchAll();

    foreach ($tableCategorie as $enregCategorie) {
        if($enregCategorie["id"] == $produit["idCategorie"] )
            echo "<option value='$enregCategorie[id]' selected>$enregCategorie[nom]</option>";
        else
            echo "<option value='$enregCategorie[id]' >$enregCategorie[nom]</option>";
    }

    echo " </select>
      </td>
      </tr>
          <tr>    <td> <button type='submit' name='action' value='MAJ_PRODUIT'>M.A.J</button></td></tr>
            
            </table>";
}