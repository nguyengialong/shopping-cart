<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin</title>

    <!-- Custom fonts for this template-->
    <link href="public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="public/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?view=admin&&act=index">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="?view=admin&&act=index">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Trang chủ</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <?php
        if($_SESSION['user']['role'] == 1){

            echo "<li class=\"nav-item\">
            <a class=\"nav-link\" href=\"?view=admin&&act=list_category\">
                <i class=\"fas fa-list\"></i>
                <span>Quản lý danh mục</span></a>
        </li>

        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"?view=admin&&act=list_product\">
                <i class=\"fab fa-product-hunt\"></i>
                <span>Quản lý sản phẩm</span></a>
        </li>

        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"?view=admin&&act=list_user\">
                <i class=\"fas fa-users\"></i>
                <span>Quản lý người dùng</span></a>
        </li>

        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"?view=admin&&act=list_customer\">
                <i class=\"fas fa-list\"></i>
                <span>Danh sách khách hàng</span></a>
        </li>
        
              <li class=\"nav-item\">
                        <a class=\"nav-link collapsed\" href=\"#\" data-toggle=\"collapse\" data-target=\"#collapseUtill\" aria-expanded=\"true\" aria-controls=\"collapseUtill\">
                            <i class=\"nav-icon fas fa-tree\"></i>
                            <span>Role && Permission</span>
                        </a>
                        <div id=\"collapseUtill\" class=\"collapse\" aria-labelledby=\"headingUtilities\" data-parent=\"#accordionSidebar\">
                            <div class=\"bg-white py-2 collapse-inner rounded\">
               
                                    <a class=\"dropdown-item\" href=\"?view=admin&&act=list_role\"><i class=\"fa fa-btn fa-list-alt\" ></i> Role</a>
                                    <a class=\"dropdown-item\"href=\"?view=admin&&act=list_permission\"><i class=\"fa fa-btn fa-list-alt\" ></i> Permission</a>
            
                
                            </div>
                        </div>
               </li>
            
             <li class=\"nav-item\">
                <a class=\"nav-link collapsed\" href=\"#\" data-toggle=\"collapse\" data-target=\"#collapseUtilities\" aria-expanded=\"true\" aria-controls=\"collapseUtilities\">
                    <i class=\"nav-icon fas fa-tree\"></i>
                    <span>Import Export File</span>
                </a>
                <div id=\"collapseUtilities\" class=\"collapse\" aria-labelledby=\"headingUtilities\" data-parent=\"#accordionSidebar\">
                    <div class=\"bg-white py-2 collapse-inner rounded\">
                        <a class=\"dropdown-item\" href=\"\"><i class=\"fa fa-btn fa-plus\"></i> Import Form</a>
                        <a class=\"dropdown-item\" href=\"\"><i class=\"fa fa-btn fa-plus\"></i> Export</a>
                    </div>
                </div>
            </li>
        
        
        ";

        }


        ?>
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" href="?view=admin&&act=list_category">-->
<!--                <i class="fas fa-list"></i>-->
<!--                <span>Quản lý danh mục</span></a>-->
<!--        </li>-->
<!---->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" href="?view=admin&&act=list_product">-->
<!--                <i class="fab fa-product-hunt"></i>-->
<!--                <span>Quản lý sản phẩm</span></a>-->
<!--        </li>-->
<!---->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" href="?view=admin&&act=list_user">-->
<!--                <i class="fas fa-users"></i>-->
<!--                <span>Quản lý người dùng</span></a>-->
<!--        </li>-->
<!---->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" href="?view=admin&&act=list_customer">-->
<!--                <i class="fas fa-list"></i>-->
<!--                <span>Danh sách khách hàng</span></a>-->
<!--        </li>-->


        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item active">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="?view=&&act="><i class="fas fa-shopping-cart"></i> Shop</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->


        <!-- Nav Item - Tables -->

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>

    <!-- End of Sidebar -->