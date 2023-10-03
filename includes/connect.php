<?php
// .env dosyasını yükleyin
require_once __DIR__ . '/vendor/autoload.php'; // Composer ile autoload dosyasını dahil edin

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


// Veritabanı bağlantı bilgilerini .env dosyasından alın
$servername = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_DATABASE'];

// Veritabanına bağlantı oluşturma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Veritabanına bağlanırken hata oluştu: " . $conn->connect_error);
}
?>
