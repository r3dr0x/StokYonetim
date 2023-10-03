<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/connect.php'; // varsayılan veritabanı bağlantını

function aylikSatisVerileriniYazdir($conn) {
    $yilVerileri = [];
    for ($ay = 1; $ay <= 12; $ay++) {
        $paddedAy = str_pad($ay, 2, '0', STR_PAD_LEFT);
        $sql = "SELECT kazanılan_para FROM satışlar WHERE DATE_FORMAT(satış_tarihi, '%m') = '$paddedAy' AND DATE_FORMAT(satış_tarihi, '%Y') = '2023'";
        $result = $conn->query($sql);

        $toplam = 0;
        while ($row = $result->fetch_assoc()) {
            $toplam += $row['kazanılan_para'];
        }

        array_push($yilVerileri, $toplam);
    }
    return $yilVerileri;
}

$salesData = aylikSatisVerileriniYazdir($conn);




?>
