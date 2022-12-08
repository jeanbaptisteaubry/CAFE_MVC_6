<?php
function GenereMotDePasse($nbChar, $seed = 1) {
    $chaine ="mnoTUzS5678kVvwxy9WXYZRNCDEFrslq41GtuaHIJKpOPQA23LcdefghiBMbj0";

    $pass = '';
    for($i=0; $i<$nbChar; $i++){
        $pass .= $chaine[random_int(0,strlen($chaine)-1)];
    }
    return $pass;
}

function passgen2($nbChar){
    return substr(str_shuffle(
        'abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789'),1, $nbChar); }

for($i=0;$i<10;$i++)
{
    echo "$i ".passgen1(10)."\n";
}
/*
echo passgen1(10);
echo"\n";
echo passgen2(10); */