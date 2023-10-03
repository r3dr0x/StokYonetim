<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/connect.php';

function fetch_total_count($conn) {
    // Managers ve Employees tablolarından toplam öge sayısı
    $query = "SELECT (SELECT COUNT(*) FROM managers) + (SELECT COUNT(*) FROM employees) as total_count";
    
    // Sorguyu çalıştır
    $result = mysqli_query($conn, $query);
    
    // Toplam öge sayısını al
    $total_count = 0;
    if ($row = mysqli_fetch_assoc($result)) {
        $total_count = $row['total_count'];
    }

    // Toplam öge sayısını döndür
    return $total_count;
}

// Sonucu al ve yazdır
$total_count = fetch_total_count($conn);

?>
