<?php
// Chemin vers le fichier JSON
$jsonFilePath = 'course.json';

if (!file_exists($jsonFilePath)) {
    http_response_code(500);
    echo json_encode(['error' => 'Fichier JSON introuvable']);
    exit;
}

// Charger les données JSON
$jsonContent = file_get_contents($jsonFilePath);
$data = json_decode($jsonContent, true);

// Vérifiez si un ID de course est fourni
if (isset($_GET['id'])) {
    $courseId = intval($_GET['id']);
    foreach ($data['courses'] as $course) {
        if ($course['id'] === $courseId) {
            header('Content-Type: application/json');
            echo json_encode($course); // Retourne uniquement les données de la course sélectionnée
            exit;
        }
    }
    // Si aucune course ne correspond, retournez une erreur 404
    http_response_code(404);
    echo json_encode(['error' => 'Course not found']);
    exit;
}

// Si aucun ID n'est fourni, retournez une erreur explicite
http_response_code(400);
echo json_encode(['error' => 'ID de course manquant']);
?>
