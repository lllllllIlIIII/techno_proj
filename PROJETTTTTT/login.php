<?php
require_once 'controllers/AuthController.php';
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (AuthController::login($_POST['email'], $_POST['password'])) {
        header('Location: admin.php');
        exit;
    } else {
        $message = 'Identifiants invalides.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Connexion</h2>
    <form method="POST">
        <div class="mb-3"><label>Email</label><input name="email" class="form-control" required></div>
        <div class="mb-3"><label>Mot de passe</label><input type="password" name="password" class="form-control" required></div>
        <button class="btn btn-primary">Se connecter</button>
        <div class="text-danger mt-3"><?= $message ?></div>
    </form>

</body>
</html>
