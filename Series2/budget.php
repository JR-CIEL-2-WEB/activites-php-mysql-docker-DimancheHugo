<?php

function compareBudget($budget, $achat) {
    if($budget >= $achat) {
        echo"achat possible";
        return true;
    } else {
        echo "achat impossible";
        return false;
    }
}
?>