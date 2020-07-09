<!DOCTYPE html>
<html lang="en">
<head>
    <title>Giỏ hàng</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Little Closet template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="public/shops/styles/bootstrap-4.1.2/bootstrap.min.css">
    <link href="public/shops/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="public/shops/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="public/shops/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="public/shops/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="public/shops/styles/cart.css">
    <link rel="stylesheet" type="text/css" href="public/shops/styles/cart_responsive.css">
</head>
<body>

<!-- Menu -->

<div class="menu">

    <!-- Search -->
    <div class="menu_search">
        <form action="#" id="menu_search_form" class="menu_search_form">
            <input type="text" class="search_input" placeholder="Search Item" required="required">
            <button class="menu_search_button"><img src="public/shops/images/search.png" alt=""></button>
        </form>
    </div>
    <!-- Navigation -->
    <div class="menu_nav">
        <ul>
            <?php foreach ($categories as $cate) { ?>
                <li><a href="?view=&&act=category&&id=<?= $cate['id'] ?>"><?= $cate['name'] ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <!-- Contact Info -->
    <div class="menu_contact">
        <div class="menu_phone d-flex flex-row align-items-center justify-content-start">
            <div><div><img src="public/shops/images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>

        </div>
        <div class="menu_social">
            <ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</div>

<div class="super_container">

    <!-- Header -->

    <header class="header">
        <div class="header_overlay"></div>
        <div class="header_content d-flex flex-row align-items-center justify-content-start">
            <div class="logo">
                <a href="#">
                    <div class="d-flex flex-row align-items-center justify-content-start">
                        <div><img src="public/shops/images/logo_1.png" alt=""></div>
                        <div><a href="?view=&&act=" style="font-weight: bold; color: black; font-size: 25px; margin-left: 10px" >  Fast Fashion Shop</a></div>
                    </div>
                </a>
            </div>
            <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
            <nav class="main_nav">
                <ul class="d-flex flex-row align-items-start justify-content-start">
                    <?php foreach ($categories as $cate) { ?>
                        <li><a href="?view=&&act=category&&id=<?= $cate['id'] ?>"><?= $cate['name'] ?></a></li>
                    <?php } ?>
                </ul>
            </nav>
            <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
                <!-- Search -->
<!--                <div class="header_search">-->
<!--                    <form method="post" id="header_search_form">-->
<!--                        <input type="text" class="search_input" name="search" placeholder="Tìm kiếm" required="required">-->
<!--                        <button class="header_search_button"><img src="public/shops/images/search.png" alt=""></button>-->
<!--                    </form>-->
<!--                </div>-->


                <?php
                if(isset($_SESSION['cart'])){
                    echo " <div class=\"cart\"><a href=\"?view=&&act=cart\"><div><img class=\"svg\" src=\"public/shops/images/cart.svg\" alt=\"https://www.flaticon.com/authors/freepik\"></div></a></div>";
                }
                ?>

                <?php
                if (isset($_SESSION['user'])){
                    echo " "."<div class=\"user\"><a href=\"?view=login&&act=logout\"><div><img src=\"public/shops/images/user.svg\" alt=\"https://www.flaticon.com/authors/freepik\"><div>1</div></div></a></div>";
                    echo $_SESSION['user']['name'];
                }else{
                    echo " "."<div class=\"user\"><a href=\"?view=login&&act=\"><div><img src=\"public/shops/images/user.svg\" alt=\"https://www.flaticon.com/authors/freepik\"><div>1</div></div></a></div>";
                    echo "Đăng nhập";
                }
                ?>

                <!-- Phone -->
            </div>
        </div>
    </header>