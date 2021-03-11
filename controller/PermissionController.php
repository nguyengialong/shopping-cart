<?php
require_once ('models/Permission.php');

class PermissionController{
    public $permission;

    public function __construct()
    {
        $this->permission = new Permission();

    }

    public function list_permission()
    {
        $listPermission = $this->permission->all();
        require_once('views/admins/permission/index.php');
    }

    public function add_permission()
    {
        require_once('views/admins/permission/add.php');
    }

    public function store_permission()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $data = [

            'name' => $_POST['name'],
            'created_at' => date("Y-m-d H:i:s"),

        ];

        $new_permission = $this->permission->insert($data);
        header("Location: ?view=admin&act=list_permission");
    }

    public function edit_permission()
    {
        $id = $_GET['id'];
        $data = $this->permission->edit($id);
        require_once('views/admins/permission/edit.php');
    }

    public function update_permission()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $id = $_GET['id'];

        $data = [

            'name' => $_POST['name'],
            'created_at' => date("Y-m-d H:i:s"),
            'update_at' => date("Y-m-d H:i:s"),

        ];

        $permission = $this->permission->updatePermission($data, $id);
        header('Location: index.php?view=admin&act=list_permission');

    }

    public function delete_permission()
    {
        $id = $_GET['id'];
        $this->permission->delete($id);
        header('Location: ?view=admin&act=list_permission');

    }










}

?>