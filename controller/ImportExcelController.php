<?php
require_once('models/ImportExcel.php');
require_once('models/User.php');
require_once ('models/Classes/PHPExcel.php');
class ImportExcelController{

    public $import;
    public $getUser;


    public function __construct()
    {

        $this->import = new ImportExcel();
        $this->getUser = new User();

    }

    public function index(){
        require_once('views/admins/importExcel/index.php');
    }

    public function importFile(){

        $data = $_FILES["file"]["name"];
        $objPHPExcel =  $objPHPExcel = PHPExcel_IOFactory::load('/home/long/Downloads/'.$data);
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
            $this->import->insert($data);
        }

        header('Location: ?view=admin&&act=importForm');


    }

    public function Export(){
        $fileName = 'userExportExample.xlsx';
        $users = $this->getUser->all();;
        $objPHPExcel = new PHPExcel();
        $i = 2;


        $objPHPExcel->createSheet();

        $activeSheet = $objPHPExcel->setActiveSheetIndex(0);

        $activeSheet->setCellValue('A1', 'id')
            ->setCellValue('B1', 'name')
            ->setCellValue('C1', 'email')
            ->setCellValue('D1', 'email_verified_at')
            ->setCellValue('E1', 'password')
            ->setCellValue('F1', 'address')
            ->setCellValue('G1', 'remember_token')
            ->setCellValue('H1', 'created_at')
            ->setCellValue('I1', 'updated_at');

        foreach ($users as  $item){

            $activeSheet->setCellValue("A$i",$item->id);
            $activeSheet->setCellValue("B$i",$item->name);
            $activeSheet->setCellValue("C$i",$item->email);
            $activeSheet->setCellValue("D$i",$item->email_verified_at);
            $activeSheet->setCellValue("E$i",$item->password);
            $activeSheet->setCellValue("F$i",$item->address);
            $activeSheet->setCellValue("G$i",$item->remember_token);
            $activeSheet->setCellValue("H$i",$item->created_at);
            $activeSheet->setCellValue("I$i",$item->updated_at);

            $i++;

        }

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('/home/long/shopping-cart/public/fileExcel/'.$fileName);

        die('abc');


    }


}

?>