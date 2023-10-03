<?php
require_once 'connect.php';

function getProfilePhotoLink($conn, $user_id) {
    $employee_sql = "SELECT photo_link FROM employees WHERE email = '$user_id'";
    $employee_result = $conn->query($employee_sql);

    if ($employee_result->num_rows > 0) {
        $employee_row = $employee_result->fetch_assoc();
        $photo_link = $employee_row['photo_link'];

        if (startsWith($photo_link, "http://")) {
            return $photo_link;
        }
    }

    // Managers tablosundan photo_link alınması
    $manager_sql = "SELECT photo_link FROM managers WHERE email = '$user_id'";
    $manager_result = $conn->query($manager_sql);

    if ($manager_result->num_rows > 0) {
        $manager_row = $manager_result->fetch_assoc();
        $photo_link = $manager_row['photo_link'];

        if (startsWith($photo_link, "http://")) {
            return $photo_link;
        }
    }

    // Eğer her iki tabloda da kayıt yoksa veya uygun link yoksa varsayılan fotoğraf linki dönebilirsiniz
    return 'http://'. $_SERVER['HTTP_HOST'] . '/includes/default_photo_link.jpg';
}

// Yardımcı fonksiyon: Verilen string belirtilen önek ile başlıyorsa true döner, aksi halde false döner.
function startsWith($haystack, $needle) {
    return substr($haystack, 0, strlen($needle)) === $needle;
}
?>
