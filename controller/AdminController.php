<?php
require_once('models/Category.php');
require_once ('models/Product.php');
require_once ('models/User.php');
require_once ('models/Customer.php');
require_once ('models/Role.php');
require_once ('models/Model_has_Role.php');
require_once ('controller/CheckPermissionController.php');



class AdminController
{
    public $category;
    public $product;
    public $user;
    public $customer;
    public $role;
    public $userRole;
    public $checkPermission;

    public function __construct()
    {

        $this->category = new Category();
        $this->product = new Product();
        $this->user = new User();
        $this->customer = new Customer();
        $this->role = new Role();
        $this->userRole = new Model_has_Role();
        $this->checkPermission = new CheckPermissionController();
    }




    public function index()
    {

        require_once('views/admins/index.php');
    }

    public function list_category()
    {

        $categories = $this->category->all();


        require_once('views/admins/categories/index.php');
    }

    public function add_category()
    {
        require_once('views/admins/categories/add.php');
    }

    public function add_process()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->category->upload();
        $data = [
            'name' => $_POST['name'],
            'image' => $_FILES["image"]["name"],
            'parent_id' => '',
            'created_at' => date("Y-m-d H:i:s"),

        ];
        $new_category = $this->category->insert($data);
        header("Location: ?view=admin&act=list_category");
    }

    public function edit_category()
    {
        $id = $_GET['id'];
        $data = $this->category->edit($id);
        require_once('views/admins/categories/edit.php');
    }

    public function edit_process()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id = $_GET['id'];
        $old_image = $this->category->edit($id);
        if (!empty($_FILES["image"]["name"])) {
            $this->category->upload();
        }
        $data = [
            'name' => $_POST['name'],
            'image' => empty($_FILES["image"]["name"]) ? $old_image[0]['image'] : $_FILES["image"]["name"],
            'created_at' => date("Y-m-d H:i:s"),
            'update_at' => date("Y-m-d H:i:s"),
        ];

        $categories = $this->category->update($data, $id);
        header('Location: index.php?view=admin&act=list_category');

    }

    public function delete_category()
    {
        $id = $_GET['id'];
        $this->category->delete($id);
        header('Location: ?view=admin&act=list_category');


    }

    public function list_product()
    {
        $products = $this->product->all();
        $categories = $this->category->all();
        require_once('views/admins/products/index.php');

    }

    public function add_product(){
        $categories = $this->category->all();
        $products = $this->product->all();
        require_once('views/admins/products/add.php');
    }

    public  function add_products(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->product->upload();
        $this->product->upload_images();
        $data = [
            'name' => $_POST['name'],
            'category_id' => $_POST['category_id'],
            'description'  => $_POST['description'],
            'price'  => $_POST['price'],
            'sale_price'  => $_POST['sale_price'],
            'discount_percent'  => $_POST['discount_percent'],
            'image' => $_FILES["image"]["name"],
            'created_at' => date("Y-m-d H:i:s"),
            'size'  => implode("," , $_POST['size']),
            'image_product' => implode(",",$_FILES["image_product"]["name"]),
        ];
        $new_product = $this->product->InsertProduct($data);
        header("Location: ?view=admin&act=list_product");
    }

    public function edit_product()
    {
        $id = $_GET['id'];
        $categories = $this->category->all();
        $data = $this->product->edit($id);
        require_once('views/admins/products/edit.php');
    }

    public function edit_products()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id = $_GET['id'];
        $old_image = $this->product->edit($id);
        if (!empty($_FILES["image"]["name"])) {
            $this->product->upload();
        }
        $data = [
            'name' => $_POST['name'],
            'category_id' => $_POST['category_id'],
            'image' => empty($_FILES["image"]["name"]) ? $old_image[0]['image'] : $_FILES["image"]["name"],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'sale_price' => $_POST['sale_price'],
            'discount_percent' => $_POST['discount_percent'],
            'created_at' => date("Y-m-d H:i:s"),
            'update_at' => date("Y-m-d H:i:s"),
        ];

        $update_product = $this->product->updateProduct($data, $id);
        header('Location: index.php?view=admin&act=list_product');

    }

    public function delete_product()
    {
        $id = $_GET['id'];
        $this->product->delete($id);

        header('Location: ?view=admin&act=list_product');


    }



    public function list_user(){
        $users = $this->user->all();
        require_once ('views/admins/users/index.php');
    }

    public function list_customer(){
        $customers = $this->customer->all();
        require_once ('views/admins/users/customer.php');
    }


    public function delete_user()
    {

        $per = 'delete user';
        $check =  $this->checkPermission->CheckPer($per);

        if($check){
            $id = $_GET['id'];
            $this->user->deleteUser($id);
//        $this->userRole->deleteUR($id);
            header('Location: ?view=admin&act=list_user');
        }else{
            header('Location: ?view=admin&act=403');
        }





    }

    public function add_user(){

        $per = 'add user';
        $check =  $this->checkPermission->CheckPer($per);

        if($check){
            $allRole = $this->role->all();
            require_once ('views/admins/users/add.php');
        }else{
            header('Location: ?view=admin&act=403');
        }





    }

    public function store_user(){

        $per = 'add user';

        $check =  $this->checkPermission->CheckPer($per);

        if($check)
        {
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $data = [

                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'created_at' => date("Y-m-d H:i:s"),
                'update_at' => date("Y-m-d H:i:s"),
            ];

            $role = $_POST['role'];

            $id = $this->user->insert($data);
            $addrole = $this->userRole->insertUR($id,$role);
            header("Location: ?view=admin&act=list_user");
        }else{
            header('Location: ?view=admin&act=403');
        }



    }

    public function edit_user(){

        $per = 'edit user';
        $check =  $this->checkPermission->CheckPer($per);

        if($check){

            $id = $_GET['id'];
            $data = $this->user->edit($id);
            $allRole = $this->role->all();
            $userHasRole = $this->userRole->getRoleUser($id);
            require_once ('views/admins/users/edit.php');
        }else{
            header('Location: ?view=admin&act=403');
        }



    }

    public function update_user(){

        $per = 'edit user';
        $check =  $this->checkPermission->CheckPer($per);

        if($check){

            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $id = $_GET['id'];


            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'address' => $_POST['address'],
                'phone' => $_POST['phone'],
                'created_at' => date("Y-m-d H:i:s"),
                'update_at' => date("Y-m-d H:i:s"),
            ];
            $role = $_POST['role'];

            $user = $this->user->update($data, $id);
            $updateRole = $this->userRole->updateUR($id,$role);
            header('Location: index.php?view=admin&act=list_user');
        }else{
            header('Location: ?view=admin&act=403');
        }



    }

    function error403(){
        require_once('views/admins/403.php');
    }




}

?>