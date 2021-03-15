<?php

require_once ('models/Role.php');
require_once ('models/Permission.php');
require_once ('models/Model_has_Role.php');
require_once ('models/Role_has_Permission.php');

class CheckPermissionController{

    public $modelHasRole;
    public $roleHasPermission;
    public $permission;

    public function __construct()
    {


        $this->modelHasRole = new Model_has_Role();
        $this->roleHasPermission = new Role_has_Permission();
        $this->permission = new Permission();

    }

    public function CheckPer($per){

        $role = $this->modelHasRole->getRoleUser($_SESSION['user']['id']);

        $permission_id = $this->roleHasPermission->RgetP($role[0]['role_id']);
        $allPermission = [];
        foreach ($permission_id as $value){
            $name_per = $this->permission->getPermission($value['permission_id']);
            array_push($allPermission,$name_per[0]['name']);
        }

        return in_array($per,$allPermission) ? true : false;
    }
}
?>