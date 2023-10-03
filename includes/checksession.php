<?php
session_start();

function checkSession() {
    if (!isset($_SESSION['token']) || !isset($_SESSION['user_id']) || !isset($_COOKIE['user_token'])) {
        // Oturumda "token" ve "user_id" veya cookie'de "user_token" bulunmuyorsa
        header('Location: ../pages/login/login.php');
        exit;
    }
}

?>
