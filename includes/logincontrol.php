<?php
session_start();
require_once 'connect.php';

function generateToken() {
    return bin2hex(random_bytes(32)); // Örnek olarak 32 byte uzunluğunda bir token
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);

    if (isset($data['email']) && isset($data['password'])) {
        $email = $data['email'];
        $password = $data['password'];

        $employees_sql = "SELECT id, access_level FROM employees WHERE email = '$email' AND password = '$password'";
        $employees_result = $conn->query($employees_sql);

        $managers_sql = "SELECT id, access_level FROM managers WHERE email = '$email' AND password = '$password'";
        $managers_result = $conn->query($managers_sql);

        if ($employees_result->num_rows > 0 || $managers_result->num_rows > 0) {
            // Giriş başarılı
            $row = ($employees_result->num_rows > 0) ? $employees_result->fetch_assoc() : $managers_result->fetch_assoc();
            $user_id = $row['id'];
            $access_level = $row['access_level'];
            $token = generateToken();
// Oturumu sınırsız yapmak için bir tarih belirleyin, örneğin 100 yıl sonra
$unlimited_expiration = time() + (60 * 60 * 24 * 365 * 100); // 100 yıl

$_SESSION['user_id'] = $email;
$_SESSION['token'] = $token;
$_SESSION['token_expiration'] = $unlimited_expiration;


            // Tokeni bir cookie'de de sakla ve süresini belirle
            setcookie('user_token', $token, $unlimited_expiration, '/'); // Cookie tokenin süresine bağlı olarak saklanır

            $response = array(
                "status" => "success",
                "user_id" => $user_id,
                "token" => $token
            );

            echo json_encode($response);
        } else {

            $response = array(
                "status" => "false"
            );

            echo json_encode($response);
        }
    }
}
?>
