<?php
require_once ('models/Role.php');
class RoleController{

    public $role;

    public function __construct()
    {

        $this->role = new Role();


    }

    public function list_role()
    {
        $listRole = $this->role->all();
        require_once('views/admins/role/index.php');
    }

    public function add_role()
    {
        require_once('views/admins/role/add.php');
    }

    public function store_role()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $data = [
            'name' => $_POST['name'],
            'created_at' => date("Y-m-d H:i:s"),
        ];


        $new_role = $this->role->insert($data);
        header("Location: ?view=admin&act=list_role");
    }

    public function edit_role()
    {
        $id = $_GET['id'];
        $data = $this->role->edit($id);
        require_once('views/admins/role/edit.php');
    }

    public function update_role()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $id = $_GET['id'];

        $data = [
            'name' => $_POST['name'],
            'created_at' => date("Y-m-d H:i:s"),
            'update_at' => date("Y-m-d H:i:s"),
        ];


        $role =  $this->role->updateRole($data,$id);

        header('Location: index.php?view=admin&act=list_role');

    }

    public function delete_role()
    {
        $id = $_GET['id'];
        $this->role->delete($id);
        header('Location: ?view=admin&act=list_role');
    }







}
?>