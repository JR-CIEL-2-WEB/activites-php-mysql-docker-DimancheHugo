<?php
include 'Exercice_0.1.php';

    function mediane($tab_note){
        sort($tab_note);
        $n = count($tab_note);
        if($n%2 == 0){
            return ($tab_note[$n/2-1]+$tab_note[$n/2])/2;
        }else{
            return $tab_note[($n-1)/2];
        }
    }
    echo "La mediane est de ".mediane($tab_note).'/20<br>';
?>