<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/connect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/checksession.php';
checkSession();

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
        if (isset($_POST['product_id']) && isset($_POST['ekle_amount'])) {
            $product_id = $_POST['product_id'];
            $ekle_amount = $_POST['ekle_amount'];

            $update_sql = "UPDATE products SET unit_in_stock = unit_in_stock + $ekle_amount WHERE id = '$product_id'";
            if ($conn->query($update_sql)) {
                echo json_encode(array("success" => true));
            } else {
                echo json_encode(array("success" => false, "message" => "Stok eklenirken bir hata oluştu. Hata: " . $conn->error));
            }
        } else {
            echo json_encode(array("success" => false, "message" => "Ürün ID veya eklenen miktar belirtilmedi."));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Stok eklemek için yeterli yetkiniz yok."));
    }
}
?>
