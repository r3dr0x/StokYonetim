<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/connect.php';

function fetch_total_products($conn) {

    $query = "SELECT COUNT(*) as total_products FROM products";
    
    // Sorguyu çalıştır
    $result = mysqli_query($conn, $query);
    
    // Toplam öge sayısını al
    $total_products = 0;
    if ($row = mysqli_fetch_assoc($result)) {
        $total_products = $row['total_products'];
    }

    // Toplam öge sayısını döndür
    return $total_products;
}

// Sonucu al
$total_products = fetch_total_products($conn);
?>
