<?php
include_once "./fonction/motdepasse.php";


$mdp = "1234567890";
$nbBit = calculeComplexiteMDP($mdp);
echo "\n$mdp $nbBit";

$mdp = "AZERTYUIOP";
$nbBit = calculeComplexiteMDP($mdp);
echo "\n$mdp $nbBit";

$mdp = "azertyuiop";
$nbBit = calculeComplexiteMDP($mdp);
echo "\n$mdp $nbBit";

$mdp = "AZErtyuiop";
$nbBit = calculeComplexiteMDP($mdp);
echo "\n$mdp $nbBit";

$mdp = "AZer45uiop";
$nbBit = calculeComplexiteMDP($mdp);
echo "\n$mdp $nbBit";

$mdp = "AZer4@uiop123";
$nbBit = calculeComplexiteMDP($mdp);
echo "\n$mdp $nbBit";