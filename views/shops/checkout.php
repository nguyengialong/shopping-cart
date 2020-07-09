<?php
include('views/shops/layouts/header_checkout.php');
?>

    <div class="super_container_inner">
        <div class="super_overlay"></div>

        <!-- Home -->

        <div class="home">
            <div class="home_container d-flex flex-column align-items-center justify-content-end">
                <div class="home_content text-center">
                    <div class="home_title">Đặt hàng</div>
                    <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                        <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                            <li><a href="?view=&&act=">Trang trủ</a></li>
                            <li>Đặt hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Checkout -->

        <div class="checkout">
            <div class="container">
                <div class="row">
                    <!-- Billing -->
                    <div class="col-lg-6">
                        <div class="billing">
                            <div class="checkout_title">Thông tin khách hàng</div>
                            <div class="checkout_form_container">

                                <form action="?view=&&act=order" method="post" id="checkout_form" class="checkout_form">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <!-- Name -->
                                            <input type="text" name="name" id="checkout_name" class="checkout_input" placeholder="Họ và Tên" required="required">
                                        </div>
                                    </div>
                                    <div>
                                        <!-- Company -->
                                        <input type="text" name="address" id="checkout_company" placeholder="Địa chỉ" class="checkout_input" required="required">
                                    </div>
                                    <div>
                                        <!-- Company -->
                                        <input type="number" name="phone_number" id="checkout_company" placeholder="Số điện thoại" class="checkout_input" required="required">
                                    </div>
                                    <div>
                                        <!-- Company -->
                                        <input type="email" name="email" id="checkout_company" placeholder="Email" class="checkout_input">
                                    </div>

                                    <div>
                                        <!-- Province -->
                                        <select name="gender" id="checkout_province" class="dropdown_item_select checkout_input" require="required">
                                            <option value="Nam">Nam </option>
                                            <option value="Nữ">Nữ</option>
                                        </select>
                                    </div>
                                    <div><button class="btn btn-success" type="submit">Đặt hàng</button></div>

                                </form>

                            </div>
                        </div>
                    </div>

                    <!-- Cart Total -->
                    <div class="col-lg-6 cart_col">
                        <div class="cart_total">
                            <div class="cart_extra_content cart_extra_total">
                                <div class="checkout_title">Thông tin giỏ hàng</div>
                                <ul class="cart_extra_total_list">
                                    <?php
                                    $total = 0;
                                        foreach ($_SESSION['cart'] as $key => $value){
                                            $total += $_SESSION['cart'][$key]['price']*$_SESSION['cart'][$key]['qty'];
                                    ?>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_extra_total_title">Tên sản phẩm:</div>
                                        <div class="cart_extra_total_value ml-auto"><p style="font-size: 12px; font-weight: bold;"><?=$_SESSION['cart'][$key]['name']?></p></div>

                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_extra_total_title">Size:</div>
                                        <?php foreach ($_SESSION['cart'][$key]['size_product'] as $sz) { ?>
                                        <div class="cart_extra_total_value ml-auto"><?= $sz?></div>
                                        <?php } ?>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_extra_total_title">Số lượng:</div>
                                        <div class="cart_extra_total_value ml-auto"><?=$_SESSION['cart'][$key]['qty']?></div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_extra_total_title">Gía:</div>
                                        <div class="cart_extra_total_value ml-auto"><?= number_format($_SESSION['cart'][$key]['price']*$_SESSION['cart'][$key]['qty'])?> VND</div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_extra_total_title">Hình ảnh:</div>
                                        <div class="cart_extra_total_value ml-auto"><img width="100px" height="100px" src="public/uploads/images/<?=$_SESSION['cart'][$key]['image']?>" alt=""></div>
                                    </li>
                                    <hr>
                                    <?php } ?>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_extra_total_title">Thành tiền:</div>
                                        <div class="cart_extra_total_value ml-auto"><?= number_format($total)." "."VND"?></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Footer -->
<?php
include('views/shops/layouts/footer.php');
?>