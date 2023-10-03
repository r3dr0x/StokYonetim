<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/connect.php';
function getTotalExpenses($conn) {
    $totalExpenses = 0;

    $sql = "SELECT purchase_price, unit_in_stock FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $expense = $row["purchase_price"] * $row["unit_in_stock"];
            $totalExpenses += $expense;
        }
    }

    return $totalExpenses;
}



$totalExpenses = getTotalExpenses($conn);

?>
