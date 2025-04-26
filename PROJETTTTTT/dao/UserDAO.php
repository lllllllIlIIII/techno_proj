<?php
require_once 'Database.php';
require_once __DIR__ . '/../models/User.php';

class UserDAO {
    public static function getByEmail($email) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch();
        return $row ? new User(...array_values($row)) : null;
    }
}
require_once '../dao/UserDAO.php';
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);

UserDAO::register($nom, $prenom, $email, $mdp);
header("Location: login.php");
exit;

session_start();
require_once '../dao/UserDAO.php';

$user = UserDAO::getByEmail($_POST['email']);
if ($user && password_verify($_POST['password'], $user->getMotDePasse())) {
    $_SESSION['user'] = $user;
    header("Location: index.php");
    exit;
}
echo "Identifiants invalides";


