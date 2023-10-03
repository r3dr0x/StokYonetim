<?php
require_once 'connect.php';
require_once 'checksession.php';

function generateUserSelectForm() {
    global $conn;

    checkSession();

    $user_id = $_SESSION['user_id'];

    $manager_check_sql = "SELECT email FROM managers WHERE email = '$user_id'";
    $manager_check_result = $conn->query($manager_check_sql);

    if ($manager_check_result->num_rows > 0) {
        $select_sql = "SELECT id, email, name, surname, 'Yönetici' AS position FROM managers 
                       UNION 
                       SELECT id, email, name, surname, CASE WHEN position = 'görevli' THEN 'Görevli' ELSE 'Çalışan' END AS position FROM employees";
        $select_result = $conn->query($select_sql);

        if ($select_result->num_rows > 0) {
            echo '<form class="form">';
            echo '<table class="user-table">';
            echo '<thead><tr><th>ID</th><th>İsim</th><th>Soyisim</th><th>Email</th><th>Pozisyon</th><th></th></tr></thead>';
            echo '<tbody>';

            while ($row = $select_result->fetch_assoc()) {
    $id = $row['id'];
    $email = $row['email'];
    $name = $row['name'];
    $surname = $row['surname'];
    $position = $row['position'];

    echo '<tr>';
    echo '<td>' . $id . '</td>';
    echo '<td>' . $name . '</td>';
    echo '<td>' . $surname . '</td>';
    echo '<td>' . $email . '</td>';
    echo '<td>' . $position . '</td>';
    if ($user_id != $email) {
        echo '<td><button type="button" class="btn btn-danger btn-rounded btn-fw delete-button" data-id="' . $email . '">Sil</button></td>';
    } else {
        echo '<td></td>';
    }
    echo '</tr>';
}

            echo '</tbody>';
            echo '</table>';
            echo '</form>';
        } else {
            echo "Seçenekler bulunamadı.";
        }
    } else {
        echo "Bu sayfayı görüntülemek için kullanıcı haklarına sahip değilsiniz.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    generateUserSelectForm();
}
?>
