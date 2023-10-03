<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/connect.php';

function calculate_total_units_in_stock($conn) {
    // products tablosundaki units_in_stock sütunundaki tüm değerleri toplamak için sorgu
    $query = "SELECT SUM(unit_in_stock) as total_units_in_stock FROM products";
    
    // Sorguyu çalıştır
    $result = mysqli_query($conn, $query);
    
    // Toplam ürün adedini al
    $total_units_in_stock = 0;
    if ($row = mysqli_fetch_assoc($result)) {
        $total_units_in_stock = !is_null($row['total_units_in_stock']) ? $row['total_units_in_stock'] : 0;
    }

    // Toplam ürün adedini geri döndür
    return $total_units_in_stock;
}

// Sonucu hesapla ve değişkene atayın
$total_units_in_stock = calculate_total_units_in_stock($conn);

// Başka bir sayfada kullanmak için $total_units_in_stock değişkenini kullanabilirsiniz.
?>
