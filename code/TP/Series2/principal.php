<?php

include 'budget.php';
include 'moyenne.php';

$notes = array(15, 12, 9);
$moyenne = calculerMoyenne($notes);
echo "<br>La moyenne est de $moyenne / 20. </br>";

$budget = 1553.89;
$achat = 1554.76;
$result = compareBudget($budget, $achat);
echo $result;
