<?php
function Vue_AjouterProduit()
{
    echo "<html>
<head>
    <title>
        Café : Création de produit
    </title>
</head>
<body>
<H1>Ajout d'un produit</H1>
<form action=\"ajoutProduit.php\" method=\"GET\">
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

    $bdd = new PDO('mysql:host=127.0.0.1;dbname=cafe2;charset=utf8', 'root', '');

    //Interrogation de la base de donnée
    $reqBDD = $bdd->query('SELECT * FROM `categorie` ');
    $tableCategorie = $reqBDD->fetchAll();

    foreach ($tableCategorie as $enregCategorie) {
    echo "<option value='$enregCategorie[id]'>$enregCategorie[nom]</option>";
    }
    echo "
    </select>
    <br>
    <input type=\"submit\" name=\"button_envoyer\" value =\"Envoyer\">
</form>
</body>
</html>";
}