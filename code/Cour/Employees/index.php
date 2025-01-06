<?php
// Gestion du bouton
if (isset($_POST['calculer_mediane'])) {
    // Récupérer les données de la table "employees"
    $stmt = $pdo->query("SELECT salary FROM employees"); // Remplacez "salary" par le nom de la colonne concernée
    $salaries = $stmt->fetchAll(PDO::FETCH_COLUMN);

    if (!empty($salaries)) {
        $mediane = calculerMediane($salaries);
        echo "<p>La médiane des salaires est : $mediane</p>";
    } else {
        echo "<p>Aucune donnée trouvée dans la table employees.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul de la Médiane</title>
</head>
<body>
    <h1>Calcul de la Médiane des Salaires</h1>
    <form method="post">
        <button type="submit" name="calculer_mediane">Calculer la Médiane</button>
    </form>
</body>
</html>