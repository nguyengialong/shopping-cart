<!DOCTYPE html>
<html lang="en">
<?php
include('views/login/layouts/header.php');
?>
<title>SB Admin 2 - Đăng nhập</title>
<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                               <div class=" alert-success">
                                   <?php
                                   if(isset($_COOKIE['msg'])){

                                       echo "<p style='color: #0f6848'>" .$_COOKIE['msg']. "</p>";

                                   }

                                   ?>
                               </div>
                                <div class="alert-danger">
                                   <?php
                                   if(isset($_COOKIE['er_login'])){

                                       echo "<p style='color:#d52a1a'>" .$_COOKIE['er_login']. "</p>";
                                   }
                                   ?>
                                </div>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form class="user" method="POST" action="?view=login&&act=login">
                                    <div class="form-group">
                                        <input type="email" name="email"  class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password"  class="form-control form-control-user" id="exampleInputPassword" placeholder="Mật khẩu:" required="required">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Đăng nhập
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="?view=login&&act=forgot_password">Quên mật khẩu?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="?view=login&&act=form_register">Đăng kí tài khoản!</a>
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

