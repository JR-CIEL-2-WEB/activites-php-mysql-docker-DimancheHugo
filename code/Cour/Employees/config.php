<?php
// config.php : Connexion à la base de données

$host = 'mysql';
$dbname = 'appdb';
$user = 'eleve';
$password = 'eleve';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
