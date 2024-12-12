<?php
// Paramètres de connexion à la base de données
$user = "user";         // Nom d'utilisateur MySQL
$password = "password"; // Mot de passe MySQL
$database = "appdb";    // Nom de la base de données
$port = 3306;           // Port MySQL, généralement 3306 par défaut

// Connexion à la base de données en utilisant le nom de service 'mysql' comme hôte
$conn = new mysqli("mysql", $user, $password, $database, $port);

// Vérifiez si la connexion a échoué
if ($conn->connect_error) {
    // Envoi de l'erreur avec un code 500 (erreur serveur)
    http_response_code(500);
    echo json_encode(['error' => 'Erreur de connexion à la base de données: ' . $conn->connect_error]);
    exit;
}

// Vérifiez si un ID de course est fourni dans l'URL
if (isset($_GET['id'])) {
    $courseId = intval($_GET['id']); // On sécurise l'ID pour éviter les injections SQL

    // Préparer la requête SQL pour récupérer les données de la course
    $stmt = $conn->prepare("SELECT name, lat, lng FROM courses WHERE course_id = ?");
    $stmt->bind_param("i", $courseId); // Bind l'ID de la course (integer)
    $stmt->execute(); // Exécuter la requête

    // Récupérer les résultats de la requête
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Préparer les données à renvoyer sous forme de JSON
        $courseData = [
            'id' => $courseId,
            'name' => '',
            'marker' => [],  // Tableau pour les coordonnées des marqueurs
        ];

        // Parcourir les résultats et les ajouter dans le tableau courseData
        while ($row = $result->fetch_assoc()) {
            $courseData['name'] = $row['name']; // Nom de la course
            $courseData['marker'][] = [
                'lat' => $row['lat'],  // Latitude
                'lng' => $row['lng'],  // Longitude
            ];
        }

        // Spécifier que la réponse sera en format JSON
        header('Content-Type: application/json');
        // Retourner les données de la course en format JSON
        echo json_encode($courseData);
    } else {
        // Si aucune course n'a été trouvée pour l'ID donné
        http_response_code(404);
        echo json_encode(['error' => 'Course not found']);
    }

    // Fermer la préparation de la requête
    $stmt->close();
} else {
    // Si l'ID de course n'est pas fourni dans l'URL
    http_response_code(400);
    echo json_encode(['error' => 'ID de course manquant']);
}

// Fermer la connexion à la base de données
$conn->close();
?>
