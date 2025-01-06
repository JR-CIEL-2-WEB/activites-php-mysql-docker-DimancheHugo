<?php
// tri_selection.php : Fonction de tri par sélection
function tri_selection(array &$array): void {
    $n = count($array);
    for ($i = 0; $i < $n - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($array[$j] < $array[$minIndex]) {
                $minIndex = $j;
            }
        }

        // Échange des valeurs
        if ($minIndex !== $i) {
            $temp = $array[$i];
            $array[$i] = $array[$minIndex];
            $array[$minIndex] = $temp;
        }
    }
}
?>
