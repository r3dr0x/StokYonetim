<?php
require_once '../../includes/checksession.php';
require_once '../../includes/connect.php';
require_once '../../functions/nameget.php';
require_once '../../functions/checkaccess2.php';
require_once '../../includes/getphoto.php';
require_once '../../functions/product_del_list.php';


checkSession();
checkAccessAndPosition($conn, $user_id);
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

                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="../../includes/logout.php">
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
                  <span class="menu-title" href="../../includes/logout.php">Log Out</span></a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <style>
   .table-wrapper {
    width: 100%;
    overflow-x: auto;
    background-color: white;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 10px;
    margin: 0 auto;
}

.product-table {
    border-collapse: collapse;
    width: 100%;
    background-color: white;
    color: black;
    margin: 0;
}

.product-table th, .product-table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

.product-table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.product-table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.product-table tbody tr:hover {
    background-color: #ddd;
}

.product-table img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 50%;
}

.delete-button {
    padding: 5px 10px;
    background-color: #dc3545;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

@media (max-width: 768px) {
    .table-wrapper {
        overflow-x: scroll;
    }
}

</style>
        <div class="main-panel">
          <div class="content-wrapper">
<div class="form-container">
<form class="form">
    <div class="table-wrapper">
        <?php getProductListTable($conn); ?>
    </div>
</form>


        </div>


          </div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    $('.delete-button').click(function() {
        var productId = $(this).data('id');
        
        $.ajax({
            url: '../../includes/api/product_del.php',
            type: 'POST',
            data: { product_id: productId },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Başarılı',
                    text: 'Ürün başarıyla silindi.',
                }).then(function() {
                    location.reload(); // Sayfayı yenile
                });
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Hata',
                    text: 'İstek sırasında bir hata oluştu: ' + error,
                });
            }
        });
    });
});
</script>
<style>
.popup-wrapper {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 20px;
    display: none;
    z-index: 1000;
    text-align: center;
}

.popup-content {
    margin-bottom: 20px;
}

.popup-input {
    margin-bottom: 10px;
}

.popup-button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}

.popup-close {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
}
</style>

<div id="stokAzaltPopup" class="popup-wrapper">
    <span class="popup-close">&#x2716;</span>
    <div class="popup-content">
        <p>Ne kadar azaltmak istediğinizi girin:</p>
        <input type="number" id="stokAzaltInput" class="popup-input" value="1">
        <button id="stokAzaltButton" class="popup-button">Onayla</button>
    </div>
</div>
<div id="stokEklePopup" class="popup-wrapper">
    <span class="popup-close">&#x2716;</span>
    <div class="popup-content">
        <p>Ne kadar eklemek istediğinizi girin:</p>
        <input type="number" id="stokEkleInput" class="popup-input" value="1">
        <button id="stokEkleButton" class="popup-button">Onayla</button>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.exit-button').click(function() {
        var productId = $(this).data('id');
        $('#stokAzaltPopup').fadeIn();
        $('#stokAzaltButton').data('id', productId);
    });

    $('.popup-close').click(function() {
        $('#stokAzaltPopup').fadeOut();
    });

    $('#stokAzaltButton').click(function() {
        var productId = $(this).data('id');
        var azaltAmount = $('#stokAzaltInput').val();

        $.ajax({
            url: '../../includes/api/product_decrease.php',
            type: 'POST',
            data: { product_id: productId, azalt_amount: azaltAmount },
            dataType: 'json',
            success: function(response) {
                if (response.success === true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı!',
                        text: 'Stok başarıyla azaltıldı.',
                    }).then(function() {
                        window.location.reload(); 
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata!',
                        text: 'Stok azaltılırken bir hata oluştu.',
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Hata!',
                    text: 'İstek sırasında bir hata oluştu: ' + error,
                });
            }
        });

        $('#stokAzaltPopup').fadeOut();
    });
});

</script>
<script>
$(document).ready(function() {
    $('.add-button').click(function() {
        var productId = $(this).data('id');
        $('#stokEklePopup').fadeIn();
        $('#stokEkleButton').data('id', productId);
    });

    $('.popup-close').click(function() {
        $('#stokEklePopup').fadeOut();
    });

    $('#stokEkleButton').click(function() {
        var productId = $(this).data('id');
        var ekleAmount = $('#stokEkleInput').val();

        $.ajax({
            url: '../../includes/api/product_stock_add.php',
            type: 'POST',
            data: { product_id: productId, ekle_amount: ekleAmount },
            dataType: 'json',
            success: function(response) {
                if (response.success === true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı!',
                        text: 'Stok başarıyla artırıldı.',
                    }).then(function() {
                        window.location.reload(); 
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata!',
                        text: 'Stok artırılırken bir hata oluştu.',
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Hata!',
                    text: 'İstek sırasında bir hata oluştu: ' + error,
                });
            }
        });

        $('#stokEklePopup').fadeOut();
    });
});
</script>


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