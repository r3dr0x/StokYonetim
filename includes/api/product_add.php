<?php
require_once '../connect.php';
require_once '../checksession.php';

checkSession();

$user_id = $_SESSION['user_id'];

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
    if (checkUserPermission($conn, $user_id)) {
        $product_name = $_POST['product_name'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $price = $_POST['price'];
        $purchase_price = $_POST['purchase_price'];
        $unit_in_stock = $_POST['unit_in_stock'];

        if (empty($product_name) || empty($price) || empty($unit_in_stock)|| empty($purchase_price)) {
            echo json_encode(array("success" => false, "message" => "Lütfen gerekli değerleri giriniz."));
            exit;
        }
        $photo_link = ''; 

        if (!empty($_FILES['media']['tmp_name'])) {
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/imgs/product_image/';
        $fileExtension = pathinfo($_FILES['media']['name'], PATHINFO_EXTENSION);
        $newFileName = uniqid() . '.' . $fileExtension;
        $targetFile = $targetDir . $newFileName;
        move_uploaded_file($_FILES['media']['tmp_name'], $targetFile);

        $domain = $_SERVER['HTTP_HOST'];
        $photo_link = 'http://' . $domain . '/imgs/product_image/' . $newFileName;
        }



        $added_date = date("Y-m-d");
$insert_sql = "INSERT INTO products (product_name, brand, model, price,purchase_price, unit_in_stock, photo_link, added_date) 
               VALUES ('$product_name', '$brand', '$model', '$price','$purchase_price', '$unit_in_stock', '$photo_link', '$added_date')";

if ($conn->query($insert_sql) === TRUE) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false, "message" => "Veriler kaydedilirken bir hata oluştu. Hata: " . $conn->error));
}

        $conn->close();
    } else {
        echo json_encode(array("success" => false, "message" => "Ürün eklemek için yeterli yetkiniz yok."));
    }
}
?>
