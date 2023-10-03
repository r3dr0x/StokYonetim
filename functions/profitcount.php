<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/connect.php';

function toplamKazanc($conn) {
    // Satışlar tablosundaki 'kazanilan_para' sütununu toplamak için SQL sorgusu
    $sql = "SELECT SUM(kazanılan_para) AS toplam_kazanc FROM satışlar";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Toplam kazancı al
        $row = $result->fetch_assoc();
        $toplamKazanc = $row["toplam_kazanc"];
        
        // Veritabanı bağlantısını kapat
        $conn->close();

        // Toplam kazancı döndür
        return $toplamKazanc;

    } else {
        echo "0";
    }

    $conn->close();
}

// Toplam kazancı yansıtmak için fonksiyonu çağır

?>
