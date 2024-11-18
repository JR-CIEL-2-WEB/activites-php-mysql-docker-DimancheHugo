<?php
include_once 'Exercice_0.1.php';

    function mediane($salaire){
        sort($salaire);
        $n = count($salaire);
        if($n%2 == 0){
            return ($salaire[$n/2-1]+$salaire[$n/2])/2;
        }else{
            return $salaire[($n-1)/2];
        }
    }
?>