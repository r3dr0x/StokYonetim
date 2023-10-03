<?php

require_once 'connect.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);

    if (isset($data['name']) && isset($data['surname']) && isset($data['email']) && isset($data['password'])) {
        $name = $data['name'];
        $surname = $data['surname'];
        $email = $data['email'];
        $password = $data['password'];

        // Önce veritabanında bu e-posta adresinin kullanılıp kullanılmadığını kontrol edin
        $check_sql = "SELECT id FROM employees WHERE email = '$email'";
        $check_result = $conn->query($check_sql);

        if ($check_result->num_rows > 0) {
            // E-posta adresi zaten kullanılıyor
            $response = array(
                "status" => "error",
                "message" => "Bu e-posta adresi zaten kullanılıyor."
            );
        } else {
            // E-posta adresi kullanılabilir, yeni kullanıcıyı ekleyin
            $insert_sql = "INSERT INTO employees (name, surname, email, password) VALUES ('$name', '$surname', '$email', '$password')";
            if ($conn->query($insert_sql) === TRUE) {
                // Kullanıcı başarıyla kaydedildi
                $user_id = $conn->insert_id;
                $access_level = "employee"; // Yeni kullanıcıları varsayılan olarak çalışan olarak ayarlayabilirsiniz
                $token = generateToken();



                $response = array(
                    "status" => "success",
                    "user_id" => $user_id,
                    "token" => $token
                );
            } else {
                // Veritabanına kullanıcı eklenemedi
                $response = array(
                    "status" => "error",
                    "message" => "Kullanıcı kaydedilirken bir hata oluştu."
                );
            }
        }

        echo json_encode($response);
    }
}
?>
