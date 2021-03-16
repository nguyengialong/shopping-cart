<?php
require_once('models/ImportExcel.php');
require_once('models/User.php');
require_once ('models/Classes/PHPExcel.php');
require_once ('controller/CheckPermissionController.php');
class ImportExcelController{

    public $import;
    public $getUser;
    public $checkPermission;


    public function __construct()
    {

        $this->import = new ImportExcel();
        $this->getUser = new User();
        $this->checkPermission = new CheckPermissionController();

    }

    public function index(){
        require_once('views/admins/importExcel/index.php');
    }

    public function importFile(){

        $per = 'manager excel';
        $check =  $this->checkPermission->CheckPer($per);
        if($check){

            $data = $_FILES["file"]['tmp_name'];
            $objPHPExcel =  $objPHPExcel = PHPExcel_IOFactory::load($data);
            $objWorksheet = $objPHPExcel->getActiveSheet();
            $new = [];

            $combineArray = [];

            $newArray = [];

            foreach ($objWorksheet->getRowIterator() as $row) {

                $cellIterator = $row->getCellIterator();

                $cellIterator->setIterateOnlyExistingCells(false);

                $data = [];

                foreach ($cellIterator as  $cell) {

                    $data[] = $cell->getValue();

                    $filter = array_filter($data); // bo nhung phan tu khong co gia tri trong mang


                }

                array_push($new,$filter);

            }
            array_shift($new); // xoa phan tu dau tien cua mang

            foreach ($new as $value){

                $key = $keys = array(

                    'id', 'name', 'email', 'email_verified_at','password','address','phone','remember_token','created_at','updated_at'

                );

                $combineArray = array_combine($keys, $value); // tron mang

                array_shift($combineArray);

                array_push($newArray,$combineArray);
            }

            foreach ($newArray as $data){

                $checkEmail = $this->getUser->checkEmail($data['email']);

                if($checkEmail){

                    header('Location: ?view=admin&&act=importForm');
                    setcookie('er_import','Email is exist !',time() + 1);

                }else{

                    $this->import->insert($data);
                    setcookie('suc_import','Import success',time() + 1);

                }

            }

            header('Location: ?view=admin&&act=importForm');
        }else{
            header('Location: ?view=admin&act=403');
        }




    }

    public function Export(){

        $per = 'manager excel';
        $check =  $this->checkPermission->CheckPer($per);

        if($check){

            $fileName = 'userExportExample.xlsx';
            $users = $this->getUser->all();;
            $objPHPExcel = new PHPExcel();

            $i = 2;


            $objPHPExcel->createSheet();

            $activeSheet = $objPHPExcel->setActiveSheetIndex(0);

            $activeSheet->setCellValue('A1', 'id')
                ->setCellValue('B1', 'name')
                ->setCellValue('C1', 'email')
                ->setCellValue('D1', 'password')
                ->setCellValue('E1', 'status')
                ->setCellValue('F1', 'created_at')
                ->setCellValue('G1', 'updated_at')
                ->setCellValue('H1', 'phone')
                ->setCellValue('I1', 'address')
                ->setCellValue('J1', 'role');


            foreach ($users as  $item){

                $activeSheet->setCellValue("A$i",$item['id']);
                $activeSheet->setCellValue("B$i",$item['name']);
                $activeSheet->setCellValue("C$i",$item['email']);
                $activeSheet->setCellValue("D$i",$item['password']);
                $activeSheet->setCellValue("E$i",$item['status']);
                $activeSheet->setCellValue("F$i",$item['created_at']);
                $activeSheet->setCellValue("G$i",$item['updated_at']);
                $activeSheet->setCellValue("H$i",$item['phone']);
                $activeSheet->setCellValue("I$i",$item['address']);
                $activeSheet->setCellValue("J$i",$item['role']);

                $i++;

            }

            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
            $objWriter->save('/home/long/Downloads/'.$fileName);

            header('Location: ?view=admin&&act=index');

        }else{

            header('Location: ?view=admin&act=403');
        }

    }


}

?>