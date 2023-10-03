<?php
require_once '../../connect.php'; 
require_once '../../checksession.php'; 

checkSession();

$user_id = $_SESSION['user_id'];

$manager_check_sql = "SELECT email FROM managers WHERE email = '$user_id'";
$manager_check_result = $conn->query($manager_check_sql);

if ($manager_check_result->num_rows > 0) {

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
    $isGorevli = isset($_POST['isGorevli']) ? ($_POST['isGorevli'] === "görevli" ? "görevli" : null) : null;
    $isYonetici = isset($_POST['isYonetici']) ? 1 : 0;

    if (empty($email) || empty($password)) {
        echo json_encode(array("success" => false, "message" => "Lütfen email ve şifre giriniz."));
        exit;
    }

    // Kontrol: Aynı email veya şifre ile kayıt var mı?
    $check_duplicate_sql = "SELECT * FROM employees WHERE email = '$email' OR password = '$password'";
    $duplicate_result = $conn->query($check_duplicate_sql);

    if ($duplicate_result->num_rows > 0) {
        echo json_encode(array("success" => false, "message" => "Aynı email veya şifre ile kayıt yapılamaz."));
        exit;
    }

    $firstName = isset($_POST['firstName']) ? htmlspecialchars($_POST['firstName']) : null;
    $lastName = isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : null;

    $media = isset($_FILES['media']) ? $_FILES['media'] : null;
    $photo_link = null;

    if ($media) {
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/imgs/';
        $fileExtension = pathinfo($media['name'], PATHINFO_EXTENSION);
        $newFileName = uniqid() . '.' . $fileExtension;
        $targetFile = $targetDir . $newFileName;
        move_uploaded_file($media['tmp_name'], $targetFile);

        $domain = $_SERVER['HTTP_HOST'];
        $photo_link = 'http://' . $domain . '/imgs/' . $newFileName;
    }

    if ($isGorevli) {
        $insert_sql = "INSERT INTO employees (name, surname, email, password, position, photo_link) 
                       VALUES ('$firstName', '$lastName', '$email', '$password', '$isGorevli', '$photo_link')";
    } else if ($isYonetici) {
        $insert_sql = "INSERT INTO managers (name, surname, email, password, photo_link, access_level) 
                       VALUES ('$firstName', '$lastName', '$email', '$password', '$photo_link', 1)";
    }

    if (isset($insert_sql) && $conn->query($insert_sql) === TRUE) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "message" => "Veriler kaydedilirken bir hata oluştu. Hata: " . $conn->error));
    }
    
    $conn->close();
}

} else {

    echo json_encode(array("success" => false, "message" => "Bu sayfayı görüntülemek için kullanıcı haklarına sahip değilsiniz."));
}
?>
