<?php
include 'tri_selection_ajax.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET)) {
    $list = $_GET['list'];
    $array = json_decode($list);
    tri_selection_ref($array);
    foreach ($array as $key => $value) {
        echo($value.', ');
    }
} else {
    echo "No data received";
}
?>