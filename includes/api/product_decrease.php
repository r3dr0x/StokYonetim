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
        if (isset($_POST['product_id']) && isset($_POST['azalt_amount'])) {
            $product_id = $_POST['product_id'];
            $azalt_amount = $_POST['azalt_amount'];

            $update_sql = "UPDATE products SET unit_in_stock = unit_in_stock - $azalt_amount WHERE id = '$product_id'";
            if ($conn->query($update_sql)) {
                $select_sql = "SELECT product_name, price FROM products WHERE id = '$product_id'";
                $result = $conn->query($select_sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $product_name = $row['product_name'];
                    $price = $row['price'];
                    $insert_sql = "INSERT INTO satışlar (ürün_ismi, satılan_adet, kazanılan_para, satış_tarihi) VALUES ('$product_name', $azalt_amount, $price, NOW())";
                    if ($conn->query($insert_sql)) {
                        echo json_encode(array("success" => true));
                    } else {
                        echo json_encode(array("success" => false, "message" => "Satış kaydı yapılırken bir hata oluştu. Hata: " . $conn->error));
                    }
                } else {
                    echo json_encode(array("success" => false, "message" => "Ürün bulunamadı."));
                }
            } else {
                echo json_encode(array("success" => false, "message" => "Stok azaltılırken bir hata oluştu. Hata: " . $conn->error));
            }
        } else {
            echo json_encode(array("success" => false, "message" => "Ürün ID veya azaltılacak miktar belirtilmedi."));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Stok azaltma izniniz yok."));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Geçersiz istek yöntemi."));
}

?>
