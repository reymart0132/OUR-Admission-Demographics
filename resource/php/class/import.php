<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/maps/resource/php/class/core/init.php';

class import extends config{

    public function insertGraduate(){
        if(isset($_POST['importSubmit'])){
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'text/octet-stream', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain',);

            if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

                    fgetcsv($csvFile);

                    while(($line = fgetcsv($csvFile)) !== FALSE){
                        
                        $refID = $line[0];
                        $campus = $line[1];
                        $estatus = $line[2];
                        $course = $line[3];
                        $lname = utf8_decode($line[4]);
                        $fname = utf8_decode($line[5]);
                        $mname = utf8_decode($line[6]);
                        $zip = $line[7];

                        $config = new config;
                        $con = $config->con();
                        $sql1 = "INSERT INTO `tbl_map_info`(`referenceID`, `campus`, `estatus`, `course`, `lname`, `fname`, `mname`, `zipCode`) VALUES ('$refID', '$campus', '$estatus', '$course', '$lname', '$fname', '$mname', '$zip')";
                        $data1 = $con->prepare($sql1);
                        $data1->execute();
                        
                    }
                }
                fclose($csvFile);
            }
        }

    }

    

}
?>