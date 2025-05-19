<?php
$host = 'localhost';
$dbname = 'gun'; // Remplace par le nom de ta base
$user = 'postgres'; // Remplace par ton user
$password = 'samed'; // Remplace par ton mot de passe

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
