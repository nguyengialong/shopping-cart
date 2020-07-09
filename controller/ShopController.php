<?php
require_once('models/Category.php');
require_once ('models/Product.php');
require_once ('models/User.php');
require_once ('models/Customer.php');
class ShopController{

    public $category;
    public $product;
    public $user;
    public $customer;
    public function __construct()
    {

        $this->category = new Category();
        $this->product = new Product();
        $this->user = new User();
        $this->customer = new Customer();

    }
    public function index()
    {
        $products = $this->product->all();
        $categories = $this->category->all();
        $product_shirt = $this->product->ProductbyShirt();
        $product_coat = $this->product->ProductbyCoat();
        $product_pant= $this->product->ProductbyPant();
        $product_dress = $this->product->ProductbyDress();
//        echo"<pre>";
//        print_r($product_shirt);
//         echo"</pre>";
//        die();
        if (isset($_POST['search'])){

            $products = $this->product->search($_POST['search']);
        }
        require_once('views/shops/index.php');
    }
    public function cart()
    {
        $categories = $this->category->all();
        require_once('views/shops/cart.php');
    }

    public function add_cart(){

        $id = $_GET['id'];
        $size = ['size_product' => $_POST['size']];
        $old_products = $this->product->Cart($id);
        $new_products=array_merge($old_products,$size);
        $product_cart = [];

        if(!isset($_SESSION['cart'])){

            $new_products['qty'] = 1;
            array_push($product_cart,$new_products);

        }else{
            $product_cart =  $_SESSION['cart'];
            $index = -1;
            for($i=0;$i<count($product_cart);$i++){
                $item = $product_cart[$i];
                if($item["id"] == $id){
                    $index = $i;
                    break;
                }

            }

         if($index > 0){
             $product_cart[$index]['qty'] +=1;
         }else{
             $new_products['qty'] = 1;
             array_push($product_cart,$new_products);
         }

        }
        $_SESSION['cart'] = $product_cart;
        header('Location: ?view=&act=cart');
  }

  public  function minus_cart(){

      $id = $_GET['id'];
      $size = ['size_product' => $_POST['size']];
      $old_products = $this->product->Cart($id);
      $new_products=array_merge($old_products,$size);
      $product_cart = [];

      if(isset($_SESSION['cart'])){
          $product_cart =  $_SESSION['cart'];
          $index = -1;
          for($i=0;$i<count($product_cart);$i++){
              $item = $product_cart[$i];
              if($item["id"] == $id){
                  $index = $i;
                  break;
              }

          }

          if($index >= 0){
              $qty = $product_cart[$index]['qty'];
              if($qty>1){
                  $product_cart[$index]['qty'] -=1;
              }
              else{
                  array_splice($product_cart,$index,1);
              }

          }
      }
      $_SESSION['cart'] = $product_cart;
      header('Location: ?view=&act=cart');
  }

  public function plus_cart(){
      $id = $_GET['id'];
      $size = ['size_product' => $_POST['size']];
      $old_products = $this->product->Cart($id);
      $new_products=array_merge($old_products,$size);
      $product_cart = [];
      if(isset($_SESSION['cart'])){
          $product_cart =  $_SESSION['cart'];
          $index = -1;
          for($i=0;$i<count($product_cart);$i++){
              $item = $product_cart[$i];
              if($item["id"] == $id){
                  $index = $i;
                  break;
              }

          }
          if($index >= 0){

              $qty = $product_cart[$index]['qty'] +=1;
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

    public function order(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = [
            'name' => $_POST['name'],
            'gender' => $_POST['gender'],
            'email' => $_POST['email'],
            'address' => $_POST['address'],
            'phone_number' => $_POST['phone_number'],
            'created_at' => date("Y-m-d H:i:s"),
        ];
        $customer = new Customer();
        $result = $customer->SaveCustomer($data);
        unset($_SESSION['cart']);
        header('Location: ?view=&act=');
    }

}

?>