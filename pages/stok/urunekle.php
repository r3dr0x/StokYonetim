<?php
require_once '../../includes/checksession.php';
require_once '../../includes/connect.php';
require_once '../../functions/nameget.php';
require_once '../../functions/checkaccess2.php';
require_once '../../includes/getphoto.php';

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
  /* Dikey sıralama için flexbox kullanılıyor */
  .form-row {
    display: flex;
  }

  /* Sütunları eşit genişlikte yapmak için flex kullanılıyor */
  .form-column {
    flex: 1;
  }

  .form-container {
    padding: 20px;
    margin-top: 0px;
  }

  .form {
    background-color: white;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
    display: flex;
    flex-direction: column;
    align-items: stretch; /* Genişliği en uzun olan sütuna göre ayarlar */
  }

  /* Dikey ve yatay kaydırma olacak */
  .form-container {
    overflow: auto;
  }

  .form label {
    display: block;
    margin-bottom: 10px;
  }

  .form input[type="text"],
  .form input[type="number"],
  .form input[type="password"],
  .form input[type="file"] {
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }

  .form button {
    padding: 10px;
    background-color: #44ce42;
    border: none;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 600;
    color: white;
    cursor: pointer;
    margin-top: 10px;
    margin-right: 10px;
    min-width: 150px;
  }

  .form .checkbox-container {
    display: flex;
    align-items: center;
    margin-top: 10px;
  }

  .form .checkbox-label {
    margin-left: 10px;
  }
</style>

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

                    <div class="form-container">
<form class="form" method="post" enctype="multipart/form-data">
    <label for="product_name">Ürün Adı:</label>
    <input type="text" id="product_name" name="product_name" required>
    <label for="brand">Marka:</label>
    <input type="text" id="brand" name="brand">
    <label for="model">Model:</label>
    <input type="text" id="model" name="model">
    <label for="price">Fiyat:</label>
    <input type="text" id="price" name="price" required>
    <label for="unit_in_stock">Alış Fiyatı:</label>
    <input type="text" id="purchase_price" name="purchase_price" required>
    <label for="unit_in_stock">Stok Miktarı:</label>
    <input type="text" id="unit_in_stock" name="unit_in_stock" required>

    <label for="media">Ürün Resmi:</label>
    <input type="file" id="media" name="media" accept=".jpg, .jpeg, .png" required>
    <button type="submit" class="btn btn-success btn-rounded btn-fw">Ürün Ekle</button>
</form>

        </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
  const productForm = document.querySelector(".form");
  const ekleButton = productForm.querySelector("button");

  ekleButton.addEventListener("click", async function(event) {
    event.preventDefault();

    const product_name = productForm.querySelector("#product_name").value;
    const brand = productForm.querySelector("#brand").value;
    const model = productForm.querySelector("#model").value;
    const price = productForm.querySelector("#price").value;
    const purchase_price = productForm.querySelector("#purchase_price").value;
    const unit_in_stock = productForm.querySelector("#unit_in_stock").value;
    const media = productForm.querySelector("#media").files[0];

    const formData = new FormData();
    formData.append("product_name", product_name);
    formData.append("brand", brand);
    formData.append("model", model);
    formData.append("price", price);
    formData.append("purchase_price", purchase_price);
    formData.append("unit_in_stock", unit_in_stock);
    formData.append("media", media);

    try {
      const response = await fetch("../../includes/api/product_add.php", {
        method: "POST",
        body: formData,
        headers: {
          "X-Requested-With": "XMLHttpRequest",
        },
      });

      if (response.status === 200) {
        const responseData = await response.json();
        if (responseData.success) {
          Swal.fire({
            icon: "success",
            title: "Başarılı!",
            text: "Ürün başarıyla eklendi.",
          }).then(() => {
            productForm.reset();
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Hata!",
            text: responseData.message,
          });
        }
      } else {
        Swal.fire({
          icon: "error",
          title: "Hata!",
          text: "Bir hata oluştu. Hata kodu: " + response.status,
        });
      }
    } catch (error) {
      Swal.fire({
        icon: "error",
        title: "Hata!",
        text: "Bir hata oluştu: " + error.message,
      });
    }
  });
});


</script>
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