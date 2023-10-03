<!DOCTYPE html>
<?php
require_once 'includes/checksession.php';
require_once 'includes/connect.php';
require_once 'functions/nameget.php';
require_once 'includes/getphoto.php';
require_once 'functions/usercount.php';
require_once 'functions/productcount.php';
require_once 'functions/stockcount.php';
require_once 'functions/profitcount.php';
require_once 'functions/expensescount.php';
checkSession();
$photo_link = getProfilePhotoLink($conn, $user_id);
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect Plus</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>

  <body>

    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.php"><img src="assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
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
              <a class="nav-link" href="index.php">
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
                  <li class="nav-item"> <a class="nav-link" href="pages/stok/urunekle.php">Ürün Ekle</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/stok/uruncikar.php">Ürün Çıkar</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="pages/stok/analiz.php">
                <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
                <span class="menu-title">Analiz</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/stok/stokgor.php">
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
                  <li class="nav-item"> <a class="nav-link" href="pages/admin/kullanicilar/kullaniciekle.php"> Kullanıcı Ekle </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/admin/kullanicilar/kullancisil.php"> Kullanıcı Çıkar </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/admin/kullanicilar/kullanicigor.php"> Kullanıcıları Gör </a></li>
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
            <div class="row" id="proBanner">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                  <p>Sisteme hoşgeldiniz.</p>


                  <i class="mdi mdi-close" id="bannerClose" style="margin-left: auto;"></i>
                </span>
              </div>
            </div>

            <div class="d-xl-flex justify-content-between align-items-start">
              <h2 class="text-dark font-weight-bold mb-2"> Yönetim paneli </h2>
              <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
<!--
<div class="btn-group bg-white p-3" role="group" aria-label="Basic example">

</div>
-->
                <div class="dropdown ml-0 ml-md-4 mt-2 mt-lg-0">
                  <button class="btn bg-white dropdown-toggle p-3 d-flex align-items-center" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="mdi mdi-calendar mr-1"></i><?php echo date('d M Y');?>
</button>

                  <!--
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
    <h6 class="dropdown-header">Settings</h6>
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
</div>
</div>
-->

              </div></div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
                  <ul class="nav nav-tabs tab-transparent" role="tablist">
                    
                    <li class="nav-item">
                      <a class="nav-link active" id="business-tab" data-toggle="tab" href="#business-1" role="tab" aria-selected="false">Güncel Durum</a>
                    </li>
                  </ul>
                  <div class="d-md-block d-none">
                    <a href="#" class="text-light p-1"><i class="mdi mdi-view-dashboard"></i></a>
                    <a href="#" class="text-light p-1"></a>
                  </div>
                </div>
                <div class="tab-content tab-transparent-content">
                  <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Depodaki Stok Sayısı</h5>
                            <h2 class="mb-4 text-dark font-weight-bold"><?php echo $total_units_in_stock; ?></h2>
                            <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-lightbulb icon-md absolute-center text-dark"></i></div>


                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Kullanıcı Sayısı</h5>
                            <h2 class="mb-4 text-dark font-weight-bold"><?php echo $total_count; ?></h2>
                            <div class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-account-circle icon-md absolute-center text-dark"></i></div>


                          </div>
                        </div>
                      </div>
                      <!-- <div class="col-xl-3  col-lg-6 col-sm-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body text-center">
      <h5 class="mb-2 text-dark font-weight-normal">Impressions</h5>
      <h2 class="mb-4 text-dark font-weight-bold">100,38</h2>
      <div class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-eye icon-md absolute-center text-dark"></i></div>
      <p class="mt-4 mb-0">Increased since yesterday</p>
      <h3 class="mb-0 font-weight-bold mt-2 text-dark">35%</h3>
    </div>
  </div>
</div> -->

                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Ürün Sayısı</h5>
                            <h2 class="mb-4 text-dark font-weight-bold"><?php echo $total_products; ?></h2>
                            <div class="dashboard-progress dashboard-progress-4 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-cube icon-md absolute-center text-dark"></i></div>

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 grid-margin">
                        <div class="card">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                  <h4 class="card-title mb-0">Recent Activity</h4>
                                  <div class="dropdown dropdown-arrow-none">
                                    <button class="btn p-0 text-dark dropdown-toggle" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!--      <i class="mdi mdi-dots-vertical"></i>-->
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuIconButton1">
                                      <h6 class="dropdown-header">Settings</h6>
                                      <a class="dropdown-item" href="#">Action</a>
                                      <a class="dropdown-item" href="#">Another action</a>
                                      <a class="dropdown-item" href="#">Something else here</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3 col-sm-4 grid-margin  grid-margin-lg-0">
                                <div class="wrapper pb-5 border-bottom">
                                  <div class="text-wrapper d-flex align-items-center justify-content-between mb-2">
                                    <p class="mb-0 text-dark">Toplam Kazanılan Para</p>

                                  </div>
                                  <h3 class="mb-0 text-dark font-weight-bold"><?php echo toplamKazanc($conn) ?>₺</h3>
                                  <canvas id="total-profit"></canvas>

                                </div>

                                <div class="wrapper pt-5">
                                  <div class="text-wrapper d-flex align-items-center justify-content-between mb-2">
                                    <p class="mb-0 text-dark">Gider Parası </p>

                                  </div>
                                  <h3 class="mb-4 text-dark font-weight-bold"><?php echo $totalExpenses ?>₺</h3>
                                  <canvas id="total-expences"></canvas>
                                </div>

                              </div>

<!--

<div class="col-lg-9 col-sm-8 grid-margin  grid-margin-lg-0">
    <div class="pl-0 pl-lg-4 ">
        <div class="d-xl-flex justify-content-between align-items-center mb-2">
            <div class="d-lg-flex align-items-center mb-lg-2 mb-xl-0">
                <h3 class="text-dark font-weight-bold mr-2 mb-0">Devices sales</h3>
                <h5 class="mb-0">( growth 62% )</h5>
            </div>
            <div class="d-lg-flex">
                <p class="mr-2 mb-0">Timezone:</p>
                <p class="text-dark font-weight-bold mb-0">GMT-0400 Eastern Delight Time</p>
            </div>
        </div>
        <div class="graph-custom-legend clearfix" id="device-sales-legend"></div>
        <canvas id="device-sales"></canvas>
    </div>

-->




                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="footer-inner-wraper">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©  2023</span>
                
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
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>