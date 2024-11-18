<?php

$t=array(15,12,9,18,14,16,20,7,10,11);
$n=0;
$min=0;
$temp=0;

function tri_selection($t){
    $n = count($t);
    for($i=0;$i<$n-1;$i++){
        $min = $i;
        for($j=$i+1;$j<$n;$j++){
            if($t[$j]<$t[$min]){
                $min = $j;
            }
        }
        if($min != $i){
            $temp = $t[$i];
            $t[$i] = $t[$min];
            $t[$min] = $temp;
        }
    }
    return $t;
}
echo "Tableau trié :". implode(",",tri_selection($t))."<br>";
?>