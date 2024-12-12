<?php
include'statistique.php';

$salaire=array(1500,4500,2200,1500,3300,1800,1700,2000,4000);
mediane($salaire);

echo "La moyenne est de ".moyenne($tab_note).'/20<br>';
echo "La mediane est de ".mediane($salaire)." euros<br>";

$salaireNicolas = 2200;
if($salaireNicolas<mediane($salaire)){
    echo "Nicolas est en dessous de la mediane,il est donc dans les moins bien payés";
}else{
    echo "Nicolas est au dessus de la mediane,il est donc dans les mieux payés";
}
?>