<?php
// Connexion à la base de données
$host = 'mysql';
$dbname = 'appdb';
$user = 'user';
$password = 'password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

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