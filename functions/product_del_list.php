<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/connect.php';

function getProductListTable($conn) {


    $select_sql = "SELECT id, photo_link, product_name, brand, model, price, unit_in_stock FROM products";
    $select_result = $conn->query($select_sql);

    if ($select_result->num_rows > 0) {
        echo '<table class="product-table">';
        echo '<thead><tr><th>ID</th><th>Ürün Resmi</th><th>Ürün Adı</th><th>Marka</th><th>Model</th><th>Fiyat</th><th>Stok Miktarı</th></tr></thead>';
        echo '<tbody>';

        while ($row = $select_result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . getProductImage($row['photo_link']) . '</td>';
            echo '<td>' . $row['product_name'] . '</td>';
            echo '<td>' . $row['brand'] . '</td>';
            echo '<td>' . $row['model'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';
            echo '<td>' . $row['unit_in_stock'] . '</td>';
            echo '<td><button type="button" class="btn btn-danger btn-rounded btn-fw delete-button" data-id="' . $row['id'] . '">Sil</button></td>';
            echo '<td><button type="button" class="btn btn-warning btn-rounded btn-fw exit-button" data-id="' . $row['id'] . '">Stok Azalt</button></td>';
            echo '<td><button type="button" class="btn btn-primary btn-rounded btn-fw add-button" data-id="' . $row['id'] . '">Stok Ekle</button></td>';

            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo "Ürün bulunamadı.";
    }
}

function getProductImage($photo_link) {
    return '<img src="' . $photo_link . '" alt="image" width="50" height="50">';



getProductListTable($conn);
}
?>
