<?php
/**
 *
 */
require_once('models/User.php');
require_once('models/Role.php');
require_once ('models/Model_has_Role.php');
require_once ('models/Permission.php');
require_once ('models/Role_has_Permission.php');
require_once ('controller/CheckPermissionController.php');

class LoginController
{
    public $checkPermission;
    public $modelHasRole;
    public $role;
    public $permission;
    public $roleHasPermission;



    public function __construct()
    {
        $this->checkPermission = new CheckPermissionController();
        $this->role = new Role();
        $this->modelHasRole = new Model_has_Role();
        $this->permission = new Permission();
        $this->roleHasPermission = new Role_has_Permission();

    }

    function form(){

        require_once('views/login/login.php');

    }

    function form_register(){

        require_once('views/login/register.php');
    }



    function login(){

        $data['email'] = $_POST['email'];

        $data['password'] = md5($_POST['password']);

        $user = new user();
        $result = $user->getUser($data);

        if ($result!=null)
        {
            $_SESSION['user'] = $result;
            $_SESSION['islogin'] = 1;
            $per = 'manager page';
            $check = $this->checkPermission->CheckPer($per);
            if($check){
                header('Location: ?view=admin&act=index');
            }else{
                header('Location: ?view=&act=');
            }

        }else{
            header('Location: ?view=login&act=');
            setcookie('er_login','Email hoặc mật khẩu không đúng !',time() + 1);
        }

    }

    function register(){

//        require_once('views/login/register.php');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $password = $_POST['password'];
        $re_password = $_POST['re_password'];
        if($password != $re_password){
            $_SESSION['error']= "Mật khẩu không giống nhau !";
           header('Location: ?view=login&act=form_register');

        }else{

            unset($_SESSION['error']);

            $data = [

                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'status' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'role' => 2,
            ];
            $RoleID = $_POST['roles'];
            $user = new user();
            $UserId = $user->Register_User($data);
            $this->modelHasRole->insertUR($UserId,$RoleID);
            setcookie("msg", 'Đăng ký tài khoản thành công', time() + 1);
            header('Location: ?view=login&act=');
        }


    }

    function forgot_password(){

        require_once('views/login/forgot_password.php');
    }

    function get_password(){

        require_once('models/mail.php');
        $data = $_POST['email'];
        $user = new user();
        $result = $user->getPassword($data);
        $email = $result['email'];
        $name = $result['name'];
        $password = $result['password'];
        $subject='Quên mật khẩu đăng nhập';
//        ob_start();
//         include_once('views/mail/sendmail.php');
        $contents = 'abc';
        // $contents ='abc' ;
//        ob_end_clean();
        if(isset($result['email'])){
            send_email($email,$name,$contents,$subject,$password);
            header("Location: ?view=admin&act=''");
        }else{
            setcookie('er_mail','Email của bạn không đúng!', time()+1);
            header("Location: ?view=login&act=forgot_password");
        }
    }

    function change_password(){

        require_once('views/login/change_password.php');

    }

    function new_password(){

        $data['id'] = $_GET['id'];
        $data['new_password'] = $_POST['new_password'];
        $user = new user();
        $result = $user->getNewpassword($data);
        header('Location: ?view=admin&act=index');

    }

    function error(){

        require_once('views/login/error.php');
    }

    function logout(){

        session_destroy();
//        unset($_SESSION['cart']);
        header('Location: ?view=login&act=');
    }

    function seeder(){

        $new_permission = [];

        $createRole = [
          'name' => 'admod',
          'created_at' => date("Y-m-d H:i:s"),
        ];

        $id_role = $this->role->SeederRole($createRole);

        $permission = [
            'permission'=>[
                '0'=> 'add user',
                '1'=> 'edit user',
                '2' => 'delete user',
                '3' => 'add role',
                '4' => 'edit role',
                '5' => 'delete role',
                '6' => 'add permission',
                '7' => 'edit permission',
                '8' => 'delete permission',
                '9' => 'manager page',
                '10' => 'manager excel',
            ]
        ];

        $i = 0;
        foreach ($permission as $value) {

            foreach ($value as $per){
                $date = date("Y-m-d H:i:s");
                $id_permission = $this->permission->SeederPer($per,$date);
                array_push($new_permission,$id_permission);

            }
            $i++;
        }

        $j=0;
        foreach ($new_permission as $value) {
            $role_permission = $this->roleHasPermission->SeederRP($id_role,$value);
            $j++;
        }

        $createUser = [
            'name' => 'admin',
            'email' => 'boss@gmail.com',
            'password' => '123456',
            'status' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'phone' => '0234567899',
            'address' => 'ha noi',
            'role' => 1,
        ];
        $seeder_User = new user();
        $Id_User = $seeder_User->SeederUser($createUser);
        $UR = $this->modelHasRole->insertUR($Id_User,$id_role);

        header('Location: ?view=login&act=');


    }





}
?>