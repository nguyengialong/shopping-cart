<!DOCTYPE html>
<html lang="en">
<title>SB Admin 2 - Đăng ký</title>
<?php
include('views/login/layouts/header.php');
?>

<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tạo tài khoản!</h1>
                        </div>
                        <form class="user" method="POST" action="?view=login&&act=register">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name = "name" class="form-control form-control-user" id="exampleFirstName" placeholder=" Tên: " required="required">
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" name = "phone" class="form-control form-control-user" id="exampleLastName" placeholder="Số điện thoại:" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name = "address"  class="form-control form-control-user" id="exampleInputEmail" placeholder="Địa chỉ:" required="required">
                            </div>
                            <div class="form-group">
                                <input type="email" name = "email"  class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address:" required="required">
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name = "password"  class="form-control form-control-user" id="exampleInputPassword" placeholder="Mật khẩu:" required="required">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name = "re_password"  class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Nhập lại mật khẩu:" required="required">
                                </div>
                                <?php
                                if(isset($_SESSION['error'])){
                                    echo "<p style='color: #ca2819'>".$_SESSION['error']."</p>";
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name = "roles" value="34" class="form-control form-control-user">
                            </div>
                            <button type="submit"  class="btn btn-primary btn-user btn-block">
                              Đăng kí
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="?view=login&&act=forgot_password">Quên mật khẩu?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="?view=login&&act=">Bạn đã có tài khoản rồi? Đăng nhập!</a>
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
