<?php
function GenereMotDePasse($nbChar, $seed = 1) {
    $chaine ="mnoTUzS5678kVvwxy9WXYZRNCDEFrslq41GtuaHIJKpOPQA23LcdefghiBMbj0";

    $pass = '';
    for($i=0; $i<$nbChar; $i++){
        $pass .= $chaine[random_int(0,strlen($chaine)-1)];
    }
    return $pass;
}

function calculeComplexiteMDP($mdp) : int {
    $strMinuscule = "abcdefghijklmnopqrstuvwxyz";
    $strMajuscule = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $strNumerique = "1234567890";
 //   echo "$strMinuscule $strMajuscule $strNumerique\n";
    $aMinuscule = false;
    $aMajuscule = false;
    $aNumerique = false;
    $aSpec = false;

    for($i =0; $i < strlen($mdp); $i++) {
        $iemeCaractere = "$mdp[$i]";
        if (is_numeric(strpos($strMajuscule, $iemeCaractere))) {
            $aMajuscule = true;
       //     echo "$iemeCaractere MAJ \n";
        } elseif (is_numeric(strpos($strMinuscule, $iemeCaractere))) {
            $aMinuscule = true;
         //   echo "$iemeCaractere Min \n";
        } elseif (is_numeric(strpos($strNumerique, $iemeCaractere))) {
           // echo "$iemeCaractere NUM \n";
            $aNumerique = true;
        } else {
           // echo "$iemeCaractere SPEC \n";
            $aSpec = true;

        }
    }

    $complexiteCaract = 0;
    if($aMajuscule)
        $complexiteCaract += 26;
    if($aMinuscule)
        $complexiteCaract += 26;
    if($aNumerique)
        $complexiteCaract += 10;
    if($aSpec)
        $complexiteCaract += 10;

    $nbBits = log(pow($complexiteCaract,strlen($mdp)))/log(2);
    return $nbBits;
}