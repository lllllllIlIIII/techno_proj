<?php
require_once 'controllers/AuthController.php';
AuthController::logout();
header('Location: login.php');
exit;
