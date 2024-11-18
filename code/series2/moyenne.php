<?php
    $tab_note =array(15,12,9,18,14,16,20,7,10,11);
    function moyenne($tab_note){
        $somme = 0;
        for($i=0;$i<count($tab_note);$i++){
            $somme += $tab_note[$i];
        }
        return $somme/count($tab_note);
    }
?>
