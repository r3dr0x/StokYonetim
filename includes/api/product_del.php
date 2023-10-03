<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/connect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/checksession.php';

function checkUserPermission($conn, $user_id) {
    $employee_sql = "SELECT position FROM employees WHERE email = '$user_id'";
    $employee_result = $conn->query($employee_sql);

    if ($employee_result->num_rows > 0) {
        $employee_row = $employee_result->fetch_assoc();
        if ($employee_row['position'] === 'görevli') {
            return true;
        }
    }

    $manager_sql = "SELECT email FROM managers WHERE email = '$user_id'";
    $manager_result = $conn->query($manager_sql);

    if ($manager_result->num_rows > 0) {
        return true;
    }

    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    
    if (checkUserPermission($conn, $user_id)) {
        if (isset($_POST['product_id'])) {
            $product_id = $_POST['product_id'];

            $select_sql = "SELECT photo_link FROM products WHERE id = '$product_id'";
            $select_result = $conn->query($select_sql);
            
            if ($select_result->num_rows > 0) {
    $row = $select_result->fetch_assoc();
    $photo_link = $row['photo_link'];

    if (!empty($photo_link)) {
        $photo_path = $_SERVER['DOCUMENT_ROOT'] . '/imgs/product_image/' . basename($photo_link);
        if (file_exists($photo_path)) {
            unlink($photo_path); // Resmi dosya sisteminden sil
        }
    }

    $delete_sql = "DELETE FROM products WHERE id = '$product_id'";
    if ($conn->query($delete_sql)) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "message" => "Ürün silinirken bir hata oluştu. Hata: " . $conn->error));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Ürün bulunamadı."));
}

        } else {
            echo json_encode(array("success" => false, "message" => "Ürün ID'si belirtilmedi."));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Ürün silmek için yeterli yetkiniz yok."));
    }
}
?>
