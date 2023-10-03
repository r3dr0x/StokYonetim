<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/connect.php';

function fetchSalesData($conn) {
$sql = "SELECT ürün_ismi, kazanılan_para, satılan_adet FROM satışlar";

    $result = $conn->query($sql);

    if ($result === false) {
        error_log("fetchSalesData: Veritabanı sorgusu başarısız oldu: " . $conn->error);
        return [];
    }
    
    return $result->fetch_all(MYSQLI_ASSOC);
}

$salesData = fetchSalesData($conn);


$jsonSalesData = json_encode($salesData, JSON_UNESCAPED_UNICODE);



$data = json_decode($jsonSalesData, true);

?>
