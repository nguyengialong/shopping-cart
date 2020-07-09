<?php
include('views/shops/layouts/header_product.php');
?>

    <div class="super_container_inner">
        <div class="super_overlay"></div>

        <!-- Home -->

        <div class="home">
            <div class="home_container d-flex flex-column align-items-center justify-content-end">
                <div class="home_content text-center">
                    <div class="home_title">Chi tiết sản phẩm</div>
                    <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                        <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                            <li><a href="?view=&&act=">Trang chủ</a></li>
                            <?php foreach ($categories as $category) {?>
                            <li><a href="?view=&&act=category&&id=<?= $category['id'] ?>"><?= $category['name'] ?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product -->

        <div class="product">
            <div class="container">
                <div class="row">

                    <!-- Product Image -->

                    <div class="col-lg-6">
                        <div class="product_image_slider_container">
                            <div id="slider" class="flexslider">
                                <ul class="slides">

                                    <li>
                                        <img src="public/uploads/images/<?=$detail_product['image'] ?>" />
                                    </li>

                                </ul>
                            </div>
                            <div class="carousel_container">
                                <div id="carousel" class="flexslider">
                                    <ul class="slides">
                                      <?php $image_product = explode(",",$detail_product['image_product']) ?>
                                        <?php foreach ($image_product as $value) {?>
                                            <li>
                                                <img src="public/uploads/images/<?=$value ?>" />
                                            </li>
                                        <?php }?>
                                    </ul>
                                </div>
                                <div class="fs_prev fs_nav disabled"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                <div class="fs_next fs_nav"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="col-lg-6 product_col">
                        <div class="product_info">
                            <div class="product_name"><?=$detail_product['name'] ?></div>
                            <form action="?view=&&act=add_cart&&id=<?=$detail_product['id']?>" method="post">
                            <?php foreach ($categories as $category) {?>
                                <div class="product_category"><?php if ($category['id']==$detail_product['category_id']) echo "Loại sản phẩm:"." ".$category['name'].""?></div>
                            <?php }?>
                            <div class="product_rating_container d-flex flex-row align-items-center justify-content-start">
                                <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                <div class="product_reviews">4.7 out of (3514)</div>
                                <div class="product_reviews_link"><a>Reviews</a></div>
                            </div>
                            <div class="product_price"><span><?=number_format($detail_product['price']) ." "."VND" ?></span></div>
                            <div class="product_size">
                                <div class="product_size_title">Select Size</div>
                                    <?php $size = explode(",",$detail_product['size']) ?>

                                    <select class="form-control" id=""  name="size[<?= $detail_product['id']?>]">
                                        <?php foreach ($size as $value) {?>
                                            <option value="<?=$value?>"><?=$value?></option>
                                        <?php }?>
                                    </select>

                                </div>

                            <div class="product_text">
                                <p><?=$detail_product['description'] ?></p>
                            </div>
                            <div class="product_buttons">
                                <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                    <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                        <div><div><img src="public/shops/images/heart_2.svg" class="svg" alt=""><div>+</div></div></div>
                                    </div>
                                    <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                        <div><button class="btn" type="submit">Thêm vào giỏ hàng</button></div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>

                    </div>


                </div>
            </div>
        </div>

        <!-- Boxes -->

        <div class="boxes">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box d-flex flex-row align-items-center justify-content-start">
                            <div class="mt-auto"><div class="box_image"><img src="public/shops/images/boxes_1.png" alt=""></div></div>
                            <div class="box_content">
                                <div class="box_title">Size Guide</div>
                                <div class="box_text">Phasellus sit amet nunc eros sed nec tellus.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 box_col">
                        <div class="box d-flex flex-row align-items-center justify-content-start">
                            <div class="mt-auto"><div class="box_image"><img src="public/shops/images/boxes_2.png" alt=""></div></div>
                            <div class="box_content">
                                <div class="box_title">Shipping</div>
                                <div class="box_text">Phasellus sit amet nunc eros sed nec tellus.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->


<?php
include('views/shops/layouts/footer_product.php');
?>