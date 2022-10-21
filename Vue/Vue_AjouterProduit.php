<?php
function Vue_AjouterProduit($tableCategorie)
{
    echo "<html>
<head>
    <title>
        Café : Création de produit
    </title>
</head>
<body>
<H1>Ajout d'un produit</H1>
<form>
    Nom <input type=\"text\" name=\"Nom\"><br>
    Description <input type=\"text\" name=\"Description\"><br>
    PUHT <input type=\"number\"  name=\"PUHT\"><br>
    Taux de TVA <select name=\"TxTva\">
        <option value=\"0.021\">2,1%</option>
        <option value=\"0.055\">5,5%</option>
        <option value=\"0.1\">10%</option>
        <option value=\"0.2\">20%</option>
    </select><br>
    Catégorie
    <select name=\"idCategorie\">";



    foreach ($tableCategorie as $enregCategorie) {
    echo "<option value='$enregCategorie[id]'>$enregCategorie[nom]</option>";
    }
    echo "
    </select>
    <br>
    <input type='hidden' name='case' value='Catalogue'>
    <button type=\"submit\" name=\"action\" value =\"AjouterProduitBDD\">Ajouter</button>
</form>
</body>
</html>";
}