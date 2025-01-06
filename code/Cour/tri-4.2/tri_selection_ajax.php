<?php

function tri_selection($t){
    $n = sizeof($t);
    for($i=0; $i < $n-1;$i++ ){
        $min = $i;
        for ($j=$i+1; $j < $n; $j++) { 
            if ($t[$j]<$t[$min]) {
                $min=$j;
            }
        }
        if ($min!=$i) {
            $buffer = $t[$min];
            $t[$min] =$t[$i];
            $t[$i] = $buffer;
        }
    }
    return $t;
} 
function tri_selection_ref(&$t){
    $n = sizeof($t);
    for($i=0; $i < $n-1;$i++ ){
        $min = $i;
        for ($j=$i+1; $j < $n; $j++) { 
            if ($t[$j]<$t[$min]) {
                $min=$j;
            }
        }
        if ($min!=$i) {
            $buffer = $t[$min];
            $t[$min] =$t[$i];
            $t[$i] = $buffer;
        }
    }
} 

?>