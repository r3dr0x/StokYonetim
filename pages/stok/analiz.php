<?php
require_once '../../includes/checksession.php';
require_once '../../includes/connect.php';
require_once '../../functions/nameget.php';
require_once '../../includes/getphoto.php';
require_once '../../functions/sales.php';
require_once '../../functions/salescount.php';
checkSession();
$photo_link = getProfilePhotoLink($conn, $user_id);
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect Plus</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="../../index.php"><img src="../../assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="../../index.php"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-xl-block">

          </div>
          <ul class="navbar-nav navbar-nav-right">

            
            
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="<?php echo $photo_link; ?>" alt="image">
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?php echo getUserName($conn, $user_id); ?></p>

                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                <div class="p-3 text-center bg-primary">
                  <img class="img-avatar img-avatar48 img-avatar-thumb" src="<?php echo $photo_link; ?>" alt="">
                </div>
                <div class="p-2">

                
                  
                  <div role="separator" class="dropdown-divider"></div>
                  <h5 class="dropdown-header text-uppercase  pl-2 text-dark mt-2">Olaylar</h5>

                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="../includes/logout.php">
    <span>Çıkış yap</span>
    <i class="mdi mdi-logout ml-1"></i>
</a>

                </div>
              </div>
            </li>
            
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-category">Panel</li>
            <li class="nav-item">
              <a class="nav-link" href="../../index.php">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Ana Sayfa</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Stok İşlemleri</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../stok/urunekle.php">Ürün Ekle</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../stok/uruncikar.php">Ürün Çıkar</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="../stok/analiz.php">
                <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
                <span class="menu-title">Analiz</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../stok/stokgor.php">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Ürünleri Gör</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
                <span class="menu-title">Yönetici İşlemleri</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../admin/kullanicilar/kullaniciekle.php"> Kullanıcı Ekle </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../admin/kullanicilar/kullancisil.php"> Kullanıcı Çıkar </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../admin/kullanicilar/kullanicigor.php"> Kullanıcıları Gör </a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item sidebar-user-actions">
              <div class="user-details">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div class="d-flex align-items-center">

                      <div class="sidebar-profile-text">
                        <p class="mb-1"><?php echo getUserName($conn, $user_id); ?></p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </li>

            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="#" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                  <span class="menu-title" href="../includes/logout.php">Log Out</span></a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<canvas id="myChart"></canvas>
<?php
$salesData = aylikSatisVerileriniYazdir($conn);
?>


<script>
  const salesData = <?php echo json_encode($salesData); ?>;
</script>
  <script>

const currentYear = new Date().getFullYear();

const ctx = document.getElementById('myChart').getContext('2d');

const chart = new Chart(ctx, {
  type: 'bar', 
  data: {
    labels: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
    datasets: [{
      label: `Aylık Satış Verileri ${currentYear}`,
      data: salesData,
      backgroundColor: 'rgba(75, 192, 192, 0.2)',
      borderColor: 'rgba(75, 192, 192, 1)',
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

  </script>
<style>
/* Tabloya özgü CSS sınıfları */
.custom-table {
    width: 100%;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.custom-table thead {
    background-color: #007BFF;
    color: #ffffff;
    line-height: 1.5;
}

.custom-table thead th {
    font-weight: bold;
    text-align: left;
    padding: 10px 15px;
    border-bottom: 2px solid #ffffff;
}

.custom-table tbody tr {
    border-bottom: 1px solid #dddddd;
    transition: background-color 0.25s ease;
}

.custom-table tbody tr:hover {
    background-color: #f2f2f2;
}

.custom-table tbody td {
    padding: 10px 15px;
    text-align: left;
    color: #000; /* Yazı rengini siyah yapar */
    background-color: #fff; /* Arka plan rengini beyaz yapar */
}

</style>
    <table border="1"  class="custom-table">
        <thead>
            <tr>
                <th>Ürün İsmi</th>
                <th>Satılan Adet</th>
                <th>Kazanılan Para</th>
            </tr>
        </thead>
    <tbody>
        <?php
            foreach ($data as $row) {
                echo "<tr>";
                echo "<td>".$row['ürün_ismi']."</td>";
                echo "<td>".$row['satılan_adet']."</td>";
                echo "<td>".$row['kazanılan_para']."</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
    </table>
</body>

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="footer-inner-wraper">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2023</span>

              </div>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->


  </body>
</html>