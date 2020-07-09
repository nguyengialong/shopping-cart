<?php
include('views/shops/layouts/header_index.php');

?>

    <div class="super_container_inner">
        <div class="super_overlay"></div>

        <!-- Home -->

        <div class="home">
            <!-- Home Slider -->
            <div class="home_slider_container">
                <div class="owl-carousel owl-theme home_slider">

                    <!-- Slide -->
                    <div class="owl-item">
                        <div class="background_image" style="background-image:url(public/shops/images/home.jpg)"></div>
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col fill_height">
                                    <div class="home_container d-flex flex-column align-items-center justify-content-start">
                                        <div class="home_content">
                                            <div class="home_title">New Arrivals</div>
                                            <div class="home_subtitle">Summer Wear</div>
                                            <div class="home_items">
                                                <div class="row">
                                                   <?php foreach ($product_shirt as $value) {?>
                                                    <div class="col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0">
                                                        <div class="product home_item_large">
                                                            <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                                <div>
                                                                    <div style="font-size: 19px;">Chỉ từ</div>
                                                                    <div><span style="font-size: 15px;"><?=number_format($value['price']) ." "."VND"?></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="product_image"><img src="public/uploads/images/<?=$value['image'] ?>" alt="""></div>
                                                            <div class="product_content">
                                                                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                                                    <div>
                                                                        <div>
                                                                            <div class="product_name"><a href="product.html">Cool Clothing with Brown Stripes</a></div>
                                                                            <div class="product_category">In <a href="category.html">Category</a></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ml-auto text-right">
                                                                        <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                                        <div class="product_price text-right">$3<span>.99</span></div>
                                                                    </div>
                                                                </div>
                                                                <div class="product_buttons">
                                                                    <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                                        <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                                                            <div><div><img src="public/shops/images/heart.svg" alt=""><div>+</div></div></div>
                                                                        </div>
                                                                        <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                                            <div><div><img src="public/shops/images/cart_2.svg" alt=""><div>+</div></div></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  <?php }?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide -->
                    <div class="owl-item">
                        <div class="background_image" style="background-image:url(public/shops/images/home.jpg)"></div>
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col fill_height">
                                    <div class="home_container d-flex flex-column align-items-center justify-content-start">
                                        <div class="home_content">
                                            <div class="home_title">Popular</div>
                                            <div class="home_subtitle">Summer Wear</div>
                                            <div class="home_items">
                                                <div class="row">
                                                    <?php foreach($product_pant as $value) {?>
                                                    <div class="col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0">
                                                        <div class="product home_item_large">
                                                            <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                                <div>
                                                                    <div style="font-size: 19px;">Chỉ từ</div>
                                                                    <div><span style="font-size: 15px;"><?=number_format($value['price']) ." "."VND"?></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="product_image"><img src="public/uploads/images/<?=$value['image'] ?>" alt="""></div>
                                                            <div class="product_content">
                                                                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                                                    <div>
                                                                        <div>
                                                                            <div class="product_name"><a href="product.html">Cool Clothing with Brown Stripes</a></div>
                                                                            <div class="product_category">In <a href="category.html">Category</a></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ml-auto text-right">
                                                                        <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                                        <div class="product_price text-right">$3<span>.99</span></div>
                                                                    </div>
                                                                </div>
                                                                <div class="product_buttons">
                                                                    <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                                        <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                                                            <div><div><img src="public/shops/images/heart.svg" alt=""><div>+</div></div></div>
                                                                        </div>
                                                                        <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                                            <div><div><img src="public/shops/images/cart_2.svg" alt=""><div>+</div></div></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide -->
                    <div class="owl-item">
                        <div class="background_image" style="background-image:url(public/shops/images/home.jpg)"></div>
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col fill_height">
                                    <div class="home_container d-flex flex-column align-items-center justify-content-start">
                                        <div class="home_content">
                                            <div class="home_title">Trendsetters</div>
                                            <div class="home_subtitle">Summer Wear</div>
                                            <div class="home_items">
                                                <div class="row">
                                                   <?php foreach ($product_coat as $value) {?>
                                                    <div class="col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0">
                                                        <div class="product home_item_large">
                                                            <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                                <div>
                                                                    <div style="font-size: 19px;">Chỉ từ</div>
                                                                    <div><span style="font-size: 15px;"><?=number_format($value['price']) ." "."VND"?></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="product_image"><img src="public/uploads/images/<?=$value['image'] ?>" alt="""></div>
                                                            <div class="product_content">
                                                                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                                                    <div>
                                                                        <div>
                                                                            <div class="product_name"><a href="product.html">Cool Clothing with Brown Stripes</a></div>
                                                                            <div class="product_category">In <a href="category.html">Category</a></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ml-auto text-right">
                                                                        <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                                        <div class="product_price text-right">$3<span>.99</span></div>
                                                                    </div>
                                                                </div>
                                                                <div class="product_buttons">
                                                                    <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                                        <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                                                            <div><div><img src="public/shops/images/heart.svg" alt=""><div>+</div></div></div>
                                                                        </div>
                                                                        <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                                            <div><div><img src="public/shops/images/cart_2.svg" alt=""><div>+</div></div></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide -->
                    <div class="owl-item">
                        <div class="background_image" style="background-image:url(public/shops/images/home.jpg)"></div>
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col fill_height">
                                    <div class="home_container d-flex flex-column align-items-center justify-content-start">
                                        <div class="home_content">
                                            <div class="home_title">Premium Items</div>
                                            <div class="home_subtitle">Summer Wear</div>
                                            <div class="home_items">
                                                <div class="row">
                                                    <?php foreach ($product_dress as $value) {?>
                                                    <div class="col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0">
                                                        <div class="product home_item_large">
                                                            <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                                <div>
                                                                    <div style="font-size: 19px;">Chỉ từ</div>
                                                                    <div><span style="font-size: 15px;"><?=number_format($value['price']) ." "."VND"?></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="product_image"><img src="public/uploads/images/<?=$value['image'] ?>" alt="""></div>
                                                            <div class="product_content">
                                                                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                                                    <div>
                                                                        <div>
                                                                            <div class="product_name"><a href="product.html">Cool Clothing with Brown Stripes</a></div>
                                                                            <div class="product_category">In <a href="category.html">Category</a></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ml-auto text-right">
                                                                        <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                                        <div class="product_price text-right">$3<span>.99</span></div>
                                                                    </div>
                                                                </div>
                                                                <div class="product_buttons">
                                                                    <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                                        <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                                                            <div><div><img src="public/shops/images/heart.svg" alt=""><div>+</div></div></div>
                                                                        </div>
                                                                        <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                                            <div><div><img src="public/shops/images/cart_2.svg" alt=""><div>+</div></div></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="home_slider_nav home_slider_nav_prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
                <div class="home_slider_nav home_slider_nav_next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>

                <!-- Home Slider Dots -->

                <div class="home_slider_dots_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_slider_dots">
                                    <ul id="home_slider_custom_dots" class="home_slider_custom_dots d-flex flex-row align-items-center justify-content-center">
                                        <li class="home_slider_custom_dot active">01</li>
                                        <li class="home_slider_custom_dot">02</li>
                                        <li class="home_slider_custom_dot">03</li>
                                        <li class="home_slider_custom_dot">04</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Products -->

        <div class="products">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section_title text-center">Popular on Fast Fashion Shop</div>
                    </div>
                </div>
                <div class="row page_nav_row">
                    <div class="col">
                        <div class="page_nav">
                            <ul class="d-flex flex-row align-items-start justify-content-center">
                                <?php foreach ($categories as $cate) { ?>
                                <li><a href="?view=&&act=category&&id=<?= $cate['id'] ?>"><?= $cate['name'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row products_row">

                    <!-- Product -->
                    <?php foreach ($products as $product) {?>
                    <div class="col-xl-4 col-md-6">
                        <div class="product">
                            <div class="product_image"><img src="public/uploads/images/<?= $product['image'] ?>" alt=""></div>
                            <div class="product_content">
                                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div>
                                            <div class="product_name"><a href="?view=&&act=product&&id=<?= $product['id']?>" style="font-size: 15px;"><?= $product['name'] ?></a></div>
                                            <?php foreach ($categories as $category) {?>
                                                <div class="product_category"><?php if ($category['id']==$product['category_id']) echo "Loại sản phẩm:"." ".$category['name'].""?></div>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <div class="ml-auto text-right">
                                        <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="product_price text-right" style="font-size: 16px;"><?= number_format($product['price'])?> VND</span></div>
                                    </div>
                                </div>
                                <div class="product_buttons">
                                    <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                        <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                            <div><div><img src="public/shops/images/heart_2.svg" class="svg" alt=""><div>+</div></div></div>
                                        </div>
                                        <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                            <div><div><a href="?view=&&act=product&&id=<?= $product['id']?>"><img src="public/shops/images/cart.svg" class="svg" alt=""></a><div>+</div></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- Product -->


                </div>
<!--                <div class="row load_more_row">-->
<!--                    <div class="col">-->
<!--                        <div class="button load_more ml-auto mr-auto"><a href="#">load more</a></div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>

        <!-- Boxes -->

        <div class="boxes">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="boxes_container d-flex flex-row align-items-start justify-content-between flex-wrap">

                            <!-- Box -->
                            <div class="box">
                                <div class="background_image" style="background-image:url(public/shops/images/box_1.jpg)"></div>
                                <div class="box_content d-flex flex-row align-items-center justify-content-start">
                                    <div class="box_left">
                                        <div class="box_image">
                                            <a >
                                                <div class="background_image" style="background-image:url(images/box_1_img.jpg)"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="box_right text-center">
                                        <div class="box_title">Trendsetter Collection</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Box -->
                            <div class="box">
                                <div class="background_image" style="background-image:url(public/shops/images/box_2.jpg)"></div>
                                <div class="box_content d-flex flex-row align-items-center justify-content-start">
                                    <div class="box_left">
                                        <div class="box_image">
                                            <a >
                                                <div class="background_image" style="background-image:url(public/shops/images/box_2_img.jpg)"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="box_right text-center">
                                        <div class="box_title">Popular Choice</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Box -->
                            <div class="box">
                                <div class="background_image" style="background-image:url(public/shops/images/box_3.jpg)"></div>
                                <div class="box_content d-flex flex-row align-items-center justify-content-start">
                                    <div class="box_left">
                                        <div class="box_image">
                                            <a>
                                                <div class="background_image" style="background-image:url(public/shops/images/box_3_img.jpg)"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="box_right text-center">
                                        <div class="box_title">New Choice</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features -->

        <div class="features">
            <div class="container">
                <div class="row">

                    <!-- Feature -->
                    <div class="col-lg-4 feature_col">
                        <div class="feature d-flex flex-row align-items-start justify-content-start">
                            <div class="feature_left">
                                <div class="feature_icon"><img src="public/shops/images/icon_1.svg" alt=""></div>
                            </div>
                            <div class="feature_right d-flex flex-column align-items-start justify-content-center">
                                <div class="feature_title">Fast Secure Payments</div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature -->
                    <div class="col-lg-4 feature_col">
                        <div class="feature d-flex flex-row align-items-start justify-content-start">
                            <div class="feature_left">
                                <div class="feature_icon ml-auto mr-auto"><img src="public/shops/images/icon_2.svg" alt=""></div>
                            </div>
                            <div class="feature_right d-flex flex-column align-items-start justify-content-center">
                                <div class="feature_title">Premium Products</div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature -->
                    <div class="col-lg-4 feature_col">
                        <div class="feature d-flex flex-row align-items-start justify-content-start">
                            <div class="feature_left">
                                <div class="feature_icon"><img src="public/shops/images/icon_3.svg" alt=""></div>
                            </div>
                            <div class="feature_right d-flex flex-column align-items-start justify-content-center">
                                <div class="feature_title">Free Delivery</div>
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