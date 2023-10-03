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
        $select_sql = "SELECT id, email, name, surname, 'Yönetici' AS position, photo_link FROM managers 
                       UNION 
                       SELECT id, email, name, surname, CASE WHEN position = 'görevli' THEN 'Görevli' ELSE 'Çalışan' END AS position, photo_link FROM employees";
        $select_result = $conn->query($select_sql);

        if ($select_result->num_rows > 0) {
            echo '<table class="user-table">';
            echo '<thead><tr><th>Fotoğraf</th><th>ID</th><th>İsim</th><th>Soyisim</th><th>Email</th><th>Pozisyon</th></tr></thead>';
            echo '<tbody>';

            while ($row = $select_result->fetch_assoc()) {
                $id = $row['id'];
                $email = $row['email'];
                $name = $row['name'];
                $surname = $row['surname'];
                $position = $row['position'];
                $photo_link = $row['photo_link'];

                echo '<tr>';
                echo '<td><img src="' . $photo_link . '" alt="Profil Fotoğrafı" width="50" height="50"></td>';
                echo '<td>' . $id . '</td>';
                echo '<td>' . $name . '</td>';
                echo '<td>' . $surname . '</td>';
                echo '<td>' . $email . '</td>';
                echo '<td>' . $position . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
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
