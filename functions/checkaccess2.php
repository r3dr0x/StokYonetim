<?php
function checkAccessAndPosition($conn, $user_id) {
    $manager_sql = "SELECT id FROM managers WHERE email = '$user_id'";
    $manager_result = $conn->query($manager_sql);

    $employee_sql = "SELECT position FROM employees WHERE email = '$user_id'";
    $employee_result = $conn->query($employee_sql);

    if ($manager_result->num_rows > 0) {

    } elseif ($employee_result->num_rows > 0) {
        $row = $employee_result->fetch_assoc();
        $position = $row['position'];

        if ($position !== 'görevli') {
            echo '<script>
                alert("Yetkiniz yoktur.");
                window.location.href = "../../../index.php";
            </script>';
            exit;
        }
    } else {

        header('Location: ../../../index.php');
        exit;
    }
}
?>
