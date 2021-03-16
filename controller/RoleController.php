<?php
require_once ('models/Role.php');
require_once ('models/Permission.php');
require_once ('models/Role_has_Permission.php');
require_once ('controller/CheckPermissionController.php');
class RoleController{

    public $role;
    public $permission;
    public $role_permission;
    public $checkPermission;
    public function __construct()
    {

        $this->role = new Role();
        $this->permission = new Permission();
        $this->role_permission = new Role_has_Permission();
        $this->checkPermission = new CheckPermissionController();


    }

    public function list_role()
    {
        $listRole = $this->role->all();
        require_once('views/admins/role/index.php');
    }

    public function add_role()
    {
        $per = 'add role';
        $check =  $this->checkPermission->CheckPer($per);
        if($check){
            $allPermission = $this->permission->all();
            require_once('views/admins/role/add.php');
        }else{
            header('Location: ?view=admin&act=403');
        }




    }

    public function store_role()
    {

        $per = 'add role';
        $check =  $this->checkPermission->CheckPer($per);
        if($check){
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $data = [
                'name' => $_POST['name'],
                'created_at' => date("Y-m-d H:i:s"),
            ];

            $permission = [
                'permission' => $_POST['permissions']
            ];

            $id_role = $this->role->insert($data);
            $i = 0;
            foreach ($permission as $value) {

                foreach ($value as $per){

                    $role_permission = $this->role_permission->insertRP($id_role,$per);
                }

                $i++;
            }

            header("Location: ?view=admin&act=list_role");
        }else{
            header('Location: ?view=admin&act=403');
        }



    }

    public function edit_role()
    {
        $per = 'edit role';
        $check =  $this->checkPermission->CheckPer($per);
        if($check){

            $id = $_GET['id'];
            $data = $this->role->edit($id);
            $rhp = $this->role_permission->RgetP($id);
            $listPremission = $this->permission->all();
            require_once('views/admins/role/edit.php');
        }else{
            header('Location: ?view=admin&act=403');
        }




    }

    public function update_role()
    {
        $per = 'edit role';
        $check =  $this->checkPermission->CheckPer($per);
        if($check){
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $id = $_GET['id'];


            $data = [
                'name' => $_POST['name'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ];


            $permission = [
                'permission' => $_POST['permissions']
            ];

            $role =  $this->role->updateRole($data,$id);

            $delete = $this->role_permission->deteleRgetP($id);

            $i = 0;

            foreach ($permission as $items) {

                foreach ($items as $item){

                    $role_permission = $this->role_permission->insertRP($id,$item);

                }
                $i++;
            }

            header('Location: index.php?view=admin&act=list_role');
        }else{
            header('Location: ?view=admin&act=403');
        }


    }

    public function delete_role()
    {
        $per = 'delete role';
        $check =  $this->checkPermission->CheckPer($per);
        if($check){

            $id = $_GET['id'];
            $this->role->delete($id);
            header('Location: ?view=admin&act=list_role');
        }else{
            header('Location: ?view=admin&act=403');
        }



    }


    function error403(){
        require_once('views/admins/403.php');
    }






}
?>