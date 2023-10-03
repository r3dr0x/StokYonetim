<?php
function checkAccess($conn, $user_id) {
    $manager_sql = "SELECT id FROM managers WHERE email = '$user_id'";
    $manager_result = $conn->query($manager_sql);

    if ($manager_result->num_rows <= 0) {
        echo '<script>
            alert("Yetkiniz yoktur.");
            window.location.href = "../../../index.php";
        </script>';
        exit;
    }
}



?>
