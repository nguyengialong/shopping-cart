<?php
require_once('models/Category.php');
require_once('models/Product.php');
require_once('models/User.php');
require_once('models/Customer.php');
require_once('models/Bill.php');
require_once('models/Bill_detail.php');

class ShopController
{

    public $category;
    public $product;
    public $user;
    public $customer;
    public $bill;
    public $bill_detail;

    public function __construct()
    {

        $this->category = new Category();
        $this->product = new Product();
        $this->user = new User();
        $this->customer = new Customer();
        $this->bill = new Bill();
        $this->bill_detail = new Bill_detail();


    }

    public function index()
    {
        $products = $this->product->all();
        $categories = $this->category->all();
        $product_shirt = $this->product->ProductbyShirt();
        $product_coat = $this->product->ProductbyCoat();
        $product_pant = $this->product->ProductbyPant();
        $product_dress = $this->product->ProductbyDress();
//        echo"<pre>";
//        print_r($product_shirt);
//         echo"</pre>";
//        die();
        if (isset($_POST['search'])) {

            $products = $this->product->search($_POST['search']);
        }
        require_once('views/shops/index.php');
    }

    public function cart()
    {
        $categories = $this->category->all();
        require_once('views/shops/cart.php');
    }

    public function add_cart()
    {

        $id = $_GET['id'];
        $size = ['size_product' => $_POST['size']];
        $old_products = $this->product->Cart($id);
        $new_products = array_merge($old_products, $size);
        $product_cart = [];

        if (!isset($_SESSION['cart'])) {

            $new_products['qty'] = 1;
            array_push($product_cart, $new_products);

        } else {

            $product_cart = $_SESSION['cart'];
            $index = -1;
            for ($i = 0; $i < count($product_cart); $i++) {
                $item = $product_cart[$i];
                if ($item["id"] == $id) {
                    $index = $i;
                    break;
                }

            }

            if ($index > 0) {
                $product_cart[$index]['qty'] += 1;
            } else {
                $new_products['qty'] = 1;
                array_push($product_cart, $new_products);
            }

        }
        $_SESSION['cart'] = $product_cart;
        header('Location: ?view=&act=cart');
    }

    public function minus_cart()
    {

        $id = $_GET['id'];
        $size = ['size_product' => $_POST['size']];
        $old_products = $this->product->Cart($id);
        $new_products = array_merge($old_products, $size);
        $product_cart = [];

        if (isset($_SESSION['cart'])) {
            $product_cart = $_SESSION['cart'];
            $index = -1;
            for ($i = 0; $i < count($product_cart); $i++) {
                $item = $product_cart[$i];
                if ($item["id"] == $id) {
                    $index = $i;
                    break;
                }

            }

            if ($index >= 0) {
                $qty = $product_cart[$index]['qty'];
                if ($qty > 1) {
                    $product_cart[$index]['qty'] -= 1;
                } else {
                    array_splice($product_cart, $index, 1);
                }

            }
        }
        $_SESSION['cart'] = $product_cart;
        header('Location: ?view=&act=cart');
    }

    public function plus_cart()
    {
        $id = $_GET['id'];
        $size = ['size_product' => $_POST['size']];
        $old_products = $this->product->Cart($id);
        $new_products = array_merge($old_products, $size);
        $product_cart = [];
        if (isset($_SESSION['cart'])) {
            $product_cart = $_SESSION['cart'];
            $index = -1;
            for ($i = 0; $i < count($product_cart); $i++) {
                $item = $product_cart[$i];
                if ($item["id"] == $id) {
                    $index = $i;
                    break;
                }

            }
            if ($index >= 0) {
                $qty = $product_cart[$index]['qty'] += 1;
            }
        }
        $_SESSION['cart'] = $product_cart;
        header('Location: ?view=&act=cart');
    }

//  public function destroy_cart(){
//
//        unset( $_SESSION['cart']);
//      header('Location: ?view=&act=cart');
//  }

    public function category()
    {
        $id = $_GET['id'];
        $categories = $this->category->all();
        $product_category = $this->product->ProductByCategory($id);
//        echo "<pre>";
//        print_r($product_category);
//        echo "</pre>";
//        die();
        require_once('views/shops/category.php');
    }

    public function product()
    {

        $id = $_GET['id'];
        $detail_product = $this->product->DetailProduct($id);
//        echo "<pre>";
//        print_r($detail_product);
//        echo "</pre>";
//        die();
        $categories = $this->category->all();
        require_once('views/shops/product.php');
    }

    public function checkout()
    {
        $id = $_GET['id'];
        $categories = $this->category->all();
        require_once('views/shops/checkout.php');
    }

    public function order()
    {
        require_once('models/mail_order.php');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = [
            'name' => $_POST['name'],
            'gender' => $_POST['gender'],
            'email' => $_POST['email'],
            'address' => $_POST['address'],
            'phone_number' => $_POST['phone_number'],
            'created_at' => date("Y-m-d H:i:s"),
        ];
        $total = 0;
        foreach ($_SESSION['cart'] as $key => $value) {
            $total += $_SESSION['cart'][$key]['qty'] * $_SESSION['cart'][$key]['price'];
            $data_bill = [
                'user_id' => $_SESSION['user']['id'],
                'total' => $total,
                'date_oder' => date("Y-m-d H:i:s"),
                'created_at' => date("Y-m-d H:i:s"),
            ];
        }
        $customer = new Customer();
        $bill = new Bill();
        $data_billdetail = new Bill_detail();
        $result = $customer->SaveCustomer($data);
        $result_bill = $bill->save($data_bill);
        $bills = $this->bill->all();
        foreach ($bills as $value) {
            $bill_id = $value['id'];
        }
//        var_dump($bill_id);
        foreach ($_SESSION['cart'] as $key => $item) {
            $bill_detail = [
                'bill_id' => $bill_id,
                'product_id' => $item['id'],
                'quality' => $item['qty'],
                'price' => $item['price'],
                'created_at' => date("Y-m-d H:i:s"),
            ];
        }
        $save_billdetail = $data_billdetail->SaveBillDetail($bill_detail);
        print_r($_SESSION['cart'][$key]['id']);
        $subject = 'Thông tin đơn hàng';
        $contents = 'abc';
        $name = $_POST['name'];
        $email = $_POST['email'];
        send_email_order($email, $name, $contents, $subject);
        unset($_SESSION['cart']);
        header('Location: ?view=&act=');
    }

    function destroy_cart(){

    }

}

?>