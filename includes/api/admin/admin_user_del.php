<?php
require_once '../../connect.php'; 
require_once '../../checksession.php'; 

function deleteUser($email) {
    global $conn;


    $delete_employee_sql = "DELETE FROM employees WHERE email = '$email'";
    $conn->query($delete_employee_sql);


    $delete_manager_sql = "DELETE FROM managers WHERE email = '$email'";
    $conn->query($delete_manager_sql);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    checkSession();

    $user_id = $_SESSION['user_id'];

    $manager_check_sql = "SELECT email FROM managers WHERE email = '$user_id'";
    $manager_check_result = $conn->query($manager_check_sql);

    if ($manager_check_result->num_rows > 0) {
        $email = $_POST['email']; // Gelen data-id değeri

        if ($email != $user_id) {
            deleteUser($email);
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false, "message" => "Kendinizi silemezsiniz."));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Bu sayfayı görüntülemek için kullanıcı haklarına sahip değilsiniz."));
    }
}
?>
