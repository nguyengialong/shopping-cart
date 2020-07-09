<!DOCTYPE html>
<html lang="en">
<title>SB Admin 2 - Thay đổi mật khẩu</title>
<?php
include('views/login/layouts/header.php');
?>

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
                                    <h1 class="h4 text-gray-900 mb-2">Thay đổi mật khẩu!</h1>
                                    <p class="mb-4">We get it, stuff happens. Just enter your new password below and we'll change your password!</p>
                                </div>
                                <form class="user" method="POST" action="?view=login&&act=new_password&&id=<?php if (isset($_SESSION['user'])) echo $_SESSION['user']['id'];?>">
                                    <div class="form-group">
                                        <input type="password" name="new_password" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nhập mật khẩu mới:">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Đặt lại lại mật khẩu
                                    </button>
                                </form>
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
