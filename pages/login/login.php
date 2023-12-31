
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
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="../../assets/images/logo-dark.svg">
                </div>
                <h4>Merhaba! Hoşgeldiniz</h4>
                <h6 class="font-weight-light">Devam etmek için giriş yapın.</h6>
<form class="pt-3" method="POST" id="loginForm">
    <div class="form-group">
        <input type="email" class="form-control form-control-lg" name="username" placeholder="Epostanızı Giriniz">
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-lg" name="password" placeholder="Şifrenizi giriniz">
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Giriş Yap</button>
    </div>
    <div class="my-2 d-flex justify-content-between align-items-center">
        <div class="form-check">

<!--<label class="form-check-label text-muted">
    <input type="checkbox" class="form-check-input"> Keep me signed in
</label>-->

        </div>

    </div>
<!--
<div class="mb-2">
    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
        <i class="mdi mdi-facebook mr-2"></i>Connect using Facebook
    </button>
</div>
-->

    <div class="text-center mt-4 font-weight-light">
       Kayıt olmak için <a href="../register/register.php" class="text-primary">Tıkla</a>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('loginForm');
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        
        const email = form.querySelector('[name="username"]').value;
        const password = form.querySelector('[name="password"]').value;
        
        const requestData = {
            email: email,
            password: password
        };
        
        fetch('../../includes/logincontrol.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(requestData) // JSON verisini şifreleme gerek yok, fetch kendisi halleder
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Giriş Başarılı',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    window.location.href = '../../index.php';
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Hata',
                    text: 'Email veya şifre yanlış.',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Tamam'
                });
            }
        });
    });
});

</script>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
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
  </body>
</html>