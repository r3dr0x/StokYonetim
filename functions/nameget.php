<?php
function getUserName($conn, $user_id) {
    $sql = "SELECT name, surname FROM employees WHERE email = '$user_id'
            UNION ALL
            SELECT name, surname FROM managers WHERE email = '$user_id'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $surname = $row['surname'];
        return $name . ' ' . $surname;
    } else {
        return '';
    }
}

// Eğer oturum açıksa ve user_id tanımlıysa
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    $userName = getUserName($conn, $user_id);
}

?>
