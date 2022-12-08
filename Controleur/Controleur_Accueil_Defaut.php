<?php
use PHPMailer\PHPMailer\PHPMailer;
include "./Vue/Vue_Structure_EnTete.php";
include "./fonction/motdepasse.php";
Vue_Structure_EnTete();
switch ($action) {
    case "demandeReinitialisation":
        include "Vue/Vue_Reinitilisation.php";
        Vue_Reinitilisation();
        break;
    case "actionChangerMotDePasseToken":
        if($_REQUEST["motDePasse"] == $_REQUEST["confirmationMotDePasse"])
        {
            Modele_Utilisateur_ChangerMdp($bdd,$_SESSION["utilisateur"]["id"], $_REQUEST["motDePasse"]);
            include "./Vue/Vue_Menu.php";
            Vue_Menu();
            include "./Vue/Vue_Accueil_Connecte.php";
            Vue_Accueil_Connecte($_SESSION["utilisateur"]["mail"]);
        }
        else
        {
            include "Vue/Vue_Reinitilisation.php";
            Vue_Reinitilisation("Confirmation erronée");
        }


        break;
    case "token":
        //echo $_REQUEST["valeurToken"];
        $token = Modele_Jeton_Recherche($bdd, $_REQUEST["valeurToken"]);
        if($token != false)
        {
          switch($token["idUsage"]){
              case 1 :
                  $utilisateur = Modele_Utilisateur_SelectionnerParId($bdd, $token["idUtilisateur"]);
                  $_SESSION["utilisateur"] = $utilisateur;
                  unset($_SESSION["utilisateur"]["motDePAsse"]);
                  include_once "./Vue/Vue_ChangerMotDePasseToken.php";
                  Vue_ChangerMotDePasseToken();
                  Modele_Jeton_Supprimer($bdd,$token["id"] );

                  break;
              case 2:
                  break;
          }
        }
        else
        {
            //Token invalide, on le renvoie sur l'action par défaut..
            if(isset($_SESSION["utilisateur"]))
            {
                include "./Vue/Vue_Menu.php";
                Vue_Menu();
                include "./Vue/Vue_Accueil_Connecte.php";
                Vue_Accueil_Connecte($_SESSION["utilisateur"]["mail"]);
            }
            else {
                include "./Vue/Vue_Accueil_Non_Connecte.php";
                Vue_Accueil_Non_Connecte();//formulaire où on peut se connecter !!

            }
        }
        break;
    case "validerDemandeReinitialisationParToken":
        include "Vue/Vue_Reinitilisation.php";



        //On va recherche l'utilisateur pour savoir s'il existe
        $utilisateur = Modele_Utilisateur_SelectionnerParMail($bdd, $_REQUEST["email"]);
        if($utilisateur != null) {

            $octetsAleatoires = openssl_random_pseudo_bytes (256) ;
            $valeurToken = sodium_bin2base64($octetsAleatoires, SODIUM_BASE64_VARIANT_ORIGINAL);

            Modele_Jeton_Creation($bdd,$valeurToken,$utilisateur["id"],1);


//Obligatoire pour avoir l’objet phpmailer qui marche
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = '127.0.0.1';
            $mail->Port = 1025; //Port non crypté
            $mail->SMTPAuth = false; //Pas d’authentification
            $mail->SMTPAutoTLS = false; //Pas de certificat TLS
            $mail->setFrom('test@labruleriecomtoise.fr', 'admin');
            $mail->addAddress($_REQUEST["email"], $_REQUEST["email"]);
            if ($mail->addReplyTo('test@labruleriecomtoise.fr', 'admin')) {
                $mail->Subject = 'Objet : Nouveau MDP';
                $mail->isHTML(true);

                $lien = "<a href='http://localhost:63342/CAFE_MVC_2/index.php?action=token&valeurToken=".urlencode($valeurToken)."'>cliquer sur ce lien</a>";
                //Attention, en cas de redémarrage de phpstorm le port (ici 63342 peut/va changer)
                $mail->Body = "Cliquez sur ce lien : $lien";
                if (!$mail->send()) {

                    $msg = 'Désolé, quelque chose a mal tourné. Veuillez réessayer plus tard.' . $mail->ErrorInfo;
                } else {
                    $msg = 'Message envoyé ! Merci de nous avoir contactés.';
                }
            } else {
                $msg = 'Il doit manquer qqc !';
            }
        }
        else
            $msg = "";
        Vue_Reinitilisation("La demande pour $_REQUEST[email] a été prise en compte. $msg");

        break;
    case "validerDemandeReinitialisation":
        include "Vue/Vue_Reinitilisation.php";
        $nouveauMdp = GenereMotDePasse(10);

        //On va recherche l'utilisateur pour savoir s'il existe
        $utilisateur = Modele_Utilisateur_SelectionnerParMail($bdd, $_REQUEST["email"]);
        if($utilisateur != null) {

//Obligatoire pour avoir l’objet phpmailer qui marche
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = '127.0.0.1';
            $mail->Port = 1025; //Port non crypté
            $mail->SMTPAuth = false; //Pas d’authentification
            $mail->SMTPAutoTLS = false; //Pas de certificat TLS
            $mail->setFrom('test@labruleriecomtoise.fr', 'admin');
            $mail->addAddress($_REQUEST["email"], $_REQUEST["email"]);
            if ($mail->addReplyTo('test@labruleriecomtoise.fr', 'admin')) {
                $mail->Subject = 'Objet : Nouveau MDP';
                $mail->isHTML(false);
                $mail->Body = "Voici votre nouveau mdp : " . $nouveauMdp;
                if (!$mail->send()) {

                    $msg = 'Désolé, quelque chose a mal tourné. Veuillez réessayer plus tard.' . $mail->ErrorInfo;
                } else {
                    $msg = 'Message envoyé ! Merci de nous avoir contactés.';
                }
            } else {
                $msg = 'Il doit manquer qqc !';
            }
        }
        else
            $msg = "";
        Vue_Reinitilisation("La demande pour $_REQUEST[email] a été prise en compte. $msg");
        break;
    case "seDeconnecter":
        $_SESSION = null;
        unset($_SESSION);
        include "./Vue/Vue_Accueil_Non_Connecte.php";
        Vue_Accueil_Non_Connecte();
        break;
    case "ActionParDefaut": //Accueil et action par défaut : afficher une vue !!
        if(isset($_SESSION["utilisateur"]))
        {
            include "./Vue/Vue_Menu.php";
            Vue_Menu();
            include "./Vue/Vue_Accueil_Connecte.php";
            Vue_Accueil_Connecte($_SESSION["utilisateur"]["mail"]);
        }
        else {
            include "./Vue/Vue_Accueil_Non_Connecte.php";
            Vue_Accueil_Non_Connecte();//formulaire où on peut se connecter !!

        }
        break;
    case "SInscrire":
        include "./Vue/Vue_SInscrire.php";
        $tableCentreDInteret = Modele_CentreInteret_Select_Tous($bdd);
        Vue_SInscrire($tableCentreDInteret);
        break;
    case "SeConnecter":
        include "./Vue/Vue_Connexion.php";
        Vue_Connexion();

        break;
    case "login":
        //Il va falloir que le modèle nous dise, si le mot de passe est bon !
        $utilisateur = Modele_Utilisateur_SelectionnerParMail($bdd, $_REQUEST["email"]);
        if( $utilisateur != false)
        {
            //Utilisateur connu, on va checke si le mdp est bon !!!
            if(password_verify($_REQUEST["motDePasse"], $utilisateur["motDePasse"]))
            {
                //on stocke l'utilisateur en session
                $_SESSION["utilisateur"] = $utilisateur;
                unset($_SESSION["utilisateur"]["motDePAsse"]); //on détruit le mot de passe hashé en mémoire
                // => sécurité

                //Le mot de passe en clair correspond au mot de passe hashé !!
                include "./Vue/Vue_Menu.php";
                Vue_Menu();
                include "./Vue/Vue_Accueil_Connecte.php";
                Vue_Accueil_Connecte($_SESSION["utilisateur"]["mail"]);
            }
            else
            {
                //Mot de passe pas bon !!!
                include "./Vue/Vue_Connexion.php";
                Vue_Connexion("Mot de passe erroné");
            }
        }
        else
        {
            //Mail inconnu !!!
            include "./Vue/Vue_Connexion.php";
            Vue_Connexion("Mail inconnu");
        }
        break;
    case "EnvoyerInscription":
        if (isset($_REQUEST["RGPD"])) {
            if(calculeComplexiteMDP($_REQUEST["motDePasse"])>= 80) {
//Association d'une variable PHP à chaque variable issue de la demande (REQUEST) Http
                $denominationSociale = $_REQUEST["denominationSociale"];
                $raisonSociale = $_REQUEST["raisonSociale"];
                $Adresse = $_REQUEST["Adresse"];
                $CP = $_REQUEST["CP"];
                $Ville = $_REQUEST["Ville"];
                $mailContact = $_REQUEST["mailContact"];
                $nomGerant = $_REQUEST["nomGerant"];
                $motDePasseClair = $_REQUEST["motDePasse"];
                $prenomGerant = $_REQUEST["prenomGerant"];
                $dateNaissanceGerant = $_REQUEST["dateNaissanceGerant"];
                $lieuNaissanceGerant = $_REQUEST["lieuNaissanceGerant"];
                $departementNaissanceGerant = $_REQUEST["departementNaissanceGerant"];

                $idGerant = Modele_Entreprise_Creer($bdd, $denominationSociale, $raisonSociale, $Adresse, $CP,
                    $Ville, $mailContact, $nomGerant, $prenomGerant, $dateNaissanceGerant,
                    $lieuNaissanceGerant, $departementNaissanceGerant);

                if ($idGerant) {
                    //On crée l'utilisateur associé à l'entreprise
                    Modele_Utilisateur_Creer($bdd, $mailContact, $motDePasseClair, 1);

                    //Parcours des centres d'intérêts pour les ajouter
                    if (isset($_REQUEST["centre"])) {
                        foreach ($_REQUEST["centre"] as $centre) {
                            Modele_AvoirCentreInteret_Ajouter($bdd, $centre, $idGerant);
                        }
                    }

                    include "./Vue/Vue_Accueil_Non_Connecte.php";
                    Vue_Accueil_Non_Connecte();
                    include "./Vue/Vue_Remercier.php";
                    Vue_Remercier($mailContact);


                } else {
                    //   echo 'archtung !!';
                }
            }
            else
            {
                //Complexité pas suffisante
                include "./Vue/Vue_SInscrire.php";
                $tableCentreDInteret = Modele_CentreInteret_Select_Tous($bdd);
                Vue_SInscrire($tableCentreDInteret, 'Mot de passe pas assez complexe !');
            }
        } else {
            include "./Vue/Vue_SInscrire.php";
            $tableCentreDInteret = Modele_CentreInteret_Select_Tous($bdd);
            Vue_SInscrire($tableCentreDInteret, 'RGPD pas acceptée !');
        }
        break;
    case "demandeChangerMotDePasse":
            include "./Vue/Vue_Menu.php";
            Vue_Menu();
            include "./Vue/Vue_ChangerMotDePasse.php";
            Vue_ChangerMotDePasse();
        break;
    case "actionChangerMotDePasse":
            include "./Vue/Vue_Menu.php";
            Vue_Menu();
        break ;

}

include "./Vue/Vue_Structure_BasDePage.php";
Vue_Structure_BasDePage();