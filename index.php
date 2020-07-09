<?php
session_start();

$mod = isset($_GET['view'])?$_GET['view']:"";
$act =  isset($_GET['act'])?$_GET['act']:"";

switch ($mod) {
    //login
    case 'login':
        require_once('controller/LoginController.php');
        $login_controller = new LoginController();
        switch ($act) {
            case '':
                $login_controller->form();
                break;
            case'form_register':
                $login_controller->form_register();
                break;
            case 'register':
                $login_controller->register();
                break;
            case 'login':
                $login_controller -> login();
                break;
            case 'logout':
                $login_controller -> logout();
                break;
            case 'forgot_password':
                $login_controller -> forgot_password();
                break;
            case 'get_password':
                $login_controller -> get_password();
                break;
            case 'change_password':
                $login_controller -> change_password();
                break;
            case 'new_password':
                $login_controller -> new_password();
                break;
            default:
                $login_controller ->error();
                break;
        }
        break;
    //end
    //admin
    case 'admin':
        require_once('controller/AdminController.php');
        include_once('middleware/check.php');
        $check = new Middleware();
        $check->checklogin();
        $admin_controller = new AdminController();
        switch ($act) {
            case 'index':
                $admin_controller->index();
                break;
            case 'list_category':
                $admin_controller->list_category();
                break;
            case 'add_category':
                $admin_controller->add_category();
                break;
            case 'add_process':
                $admin_controller->add_process();
                break;
            case 'edit_process':
                $admin_controller->edit_process();
                break;
            case 'delete':
                $admin_controller->delete_category();
                break;
            case 'edit_category':
                $admin_controller->edit_category();
                break;
            case 'list_product':
                $admin_controller->list_product();
                break;
            case 'add_product':
                $admin_controller->add_product();
            break;
            case 'add_products':
                $admin_controller->add_products();
            break;
            case 'edit_product':
                $admin_controller->edit_product();
                break;
            case 'edit_products':
                $admin_controller->edit_products();
                break;
            case 'delete_product':
                $admin_controller->delete_product();
                break;
            case'list_user':
                $admin_controller->list_user();
                break;
            case 'list_customer':
                $admin_controller->list_customer();
                break;
            case 'delete_user':
                $admin_controller->delete_user();
                break;
            default:
                break;
        }
        break;
    //end
    //shop
    case '':
        require_once('controller/ShopController.php');
        $shop_controller = new ShopController();
        switch ($act) {
            case '':
                $shop_controller->index();
                break;
            case'add_cart':
                $shop_controller->add_cart();
                break;
            case 'minus_cart':
                $shop_controller->minus_cart();
                break;
            case 'plus_cart':
                $shop_controller->plus_cart();
            case 'cart':
                $shop_controller->cart();
                break;
            case 'destroy_cart':
                $shop_controller->destroy_cart();
                break;
            case 'product':
                $shop_controller->product();
                break;
            case 'category':
                $shop_controller->category();
                break;
            case 'checkout':
                $shop_controller->checkout();
                break;
            case 'order':
                $shop_controller->order();
                break;

        }
        break;
    //end

    default:

        break;
}
?>
