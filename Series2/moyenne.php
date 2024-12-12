<?php
function calculerMoyenne($notes) {
    $sum = 0;
    foreach ($notes as $note) {
        $sum += $note;
    }
    $moyenne = $sum / count($notes);
    return $moyenne;
}
?>