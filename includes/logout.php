<?php
session_start();

// Oturumu temizle ve sonlandır
session_unset();
session_destroy();

// Auth token cookie'sini sil (geçerliliği sona ersin)
if (isset($_COOKIE['user_token'])) {
    setcookie('user_token', '', 1, "/"); // Geçerliliği sona ermiş bir zaman vererek anında silinmesini sağlayalım
}

header('Location: ../pages/login/login.php'); // Çıkış yaptıktan sonra login sayfasına yönlendir
exit;
?>
