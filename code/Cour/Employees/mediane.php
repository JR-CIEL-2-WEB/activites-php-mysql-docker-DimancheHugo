<?php
// Fonction pour calculer la médiane
function calculerMediane($data) {
    sort($data);
    $count = count($data);

    if ($count % 2 === 0) {
        // Si le nombre d'éléments est pair, la médiane est la moyenne des deux éléments centraux
        $mediane = ($data[$count / 2 - 1] + $data[$count / 2]) / 2;
    } else {
        // Si le nombre d'éléments est impair, la médiane est l'élément central
        $mediane = $data[floor($count / 2)];
    }

    return $mediane;
}
?>