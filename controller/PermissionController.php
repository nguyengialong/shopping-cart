<?php
require_once('models/Permission.php');
require_once('controller/CheckPermissionController.php');

class PermissionController
{

    public $permission;
    public $checkPermission;

    public function __construct()
    {
        $this->permission = new Permission();
        $this->checkPermission = new CheckPermissionController();

    }

    public function list_permission()
    {
        $per = 'add permission';
        $check = $this->checkPermission->CheckPer($per);
        if($check){

            if (isset($_GET['page'])) {

                $page = $_GET['page'];

            } else {

                $page = 1;
            }

            $limit_recode = 3; // hien bao nhieu ban ghi
            $offset = ($page - 1) * $limit_recode;
            $previous_page = $page - 1;
            $next_page = $page + 1;
            $total_pages_sql = $this->permission->CountPermission(); // lay ra cac ban ghi trong user
            $total_pages = ceil($total_pages_sql['total'] / $limit_recode); // lam tron
            $listPermission = $this->permission->getDataPage($offset, $limit_recode);

//        $listPermission = $this->permission->all();

            require_once('views/admins/permission/index.php');

        }else{

            header('Location: ?view=admin&act=403');
        }

    }

    public function add_permission()
    {
        $per = 'add permission';
        $check = $this->checkPermission->CheckPer($per);

        if ($check) {
            require_once('views/admins/permission/add.php');
        } else {
            header('Location: ?view=admin&act=403');
        }


    }

    public function store_permission()
    {
        $per = 'add permission';
        $check = $this->checkPermission->CheckPer($per);
        if ($check) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $data = [

                'name' => $_POST['name'],
                'created_at' => date("Y-m-d H:i:s"),

            ];

            $new_permission = $this->permission->insert($data);
            header("Location: ?view=admin&act=list_permission");
        } else {
            header('Location: ?view=admin&act=403');
        }


    }

    public function edit_permission()
    {
        $per = 'edit permission';
        $check = $this->checkPermission->CheckPer($per);

        if ($check) {

            $id = $_GET['id'];
            $data = $this->permission->edit($id);
            require_once('views/admins/permission/edit.php');
        } else {
            header('Location: ?view=admin&act=403');
        }


    }

    public function update_permission()
    {
        $per = 'edit permission';
        $check = $this->checkPermission->CheckPer($per);
        if ($check) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $id = $_GET['id'];

            $data = [

                'name' => $_POST['name'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),

            ];

            $permission = $this->permission->updatePermission($data, $id);
            header('Location: index.php?view=admin&act=list_permission');
        } else {
            header('Location: ?view=admin&act=403');
        }


    }

    public function delete_permission()
    {
        $per = 'delete permission';
        $check = $this->checkPermission->CheckPer($per);
        if ($check) {
            $id = $_GET['id'];
            $this->permission->delete($id);
            header('Location: ?view=admin&act=list_permission');
        } else {
            header('Location: ?view=admin&act=403');
        }


    }

    function error403()
    {
        require_once('views/admins/403.php');
    }


}

?>