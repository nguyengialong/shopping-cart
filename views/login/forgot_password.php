<!DOCTYPE html>
<html lang="en">

<?php
include('views/login/layouts/header.php');
?>
<title>SB Admin 2 - Quên mật khẩu</title>
<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">

                                    <h1 class="h4 text-gray-900 mb-2">Bạn quên mật khẩu?</h1>
                                    <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                                </div>
                                <form class="user" method="POST" action="?view=login&&act=get_password">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nhập địa chỉ Email của bạn:">
                                    </div>
                                    <div class="alert-danger">
                                        <?php
                                        if(isset($_COOKIE['er_mail'])){

                                            echo "<p style='color:#d52a1a'>" .$_COOKIE['er_mail']. "</p>";
                                        }
                                        ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Lấy lại mật khẩu
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="?view=login&&act=form_register">Đăng kí tài khoản!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="?view=login&&act=">Tài khoản của bạn đã có chưa? Đăng nhập!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="public/admin/vendor/jquery/jquery.min.js"></script>
<script src="public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="public/admin/js/sb-admin-2.min.js"></script>

</body>

</html>
