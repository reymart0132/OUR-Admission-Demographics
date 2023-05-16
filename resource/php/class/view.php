<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/maps/resource/php/class/core/init.php';
require_once 'config.php';

class view extends config{

        public function getdata(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT x.subprob, sum(x.count) as `count` FROM (SELECT `subprob`, count(*) as `count` FROM tbl_map_info INNER JOIN tbl_zipcode ON tbl_map_info.zipCode = tbl_zipcode.zipCode WHERE `referenceID` LIKE 'A2023%' GROUP BY tbl_zipcode.zipCode ORDER BY `count` DESC) x GROUP BY x.subprob";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                 // ['ph-au', 10],['ph-bu', 10],['ph-pm', 10],['ph-ba', 10],['ph-ne', 10],['ph-tr', 10],['ph-zm', 10],['ph-7017', 10],['ph-7018', 10],
                 echo "['".$row['subprob']."',".$row['count']."],";
            }
        }

        public function chartDataLocation(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT x.subprob, x.place, sum(x.count) as `count` FROM (SELECT `subprob`, `place`, count(*)as `count` FROM tbl_map_info INNER JOIN tbl_zipcode ON tbl_map_info.zipCode = tbl_zipcode.zipCode WHERE `referenceID` LIKE 'A2023%' GROUP BY tbl_zipcode.zipCode ORDER BY `count` DESC) x GROUP BY x.subprob ORDER BY `count` DESC LIMIT 20";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
              $subprob[] = $row['place'];
            }
            return $subprob;
        }

        public function chartDataCount(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT x.subprob, x.place, sum(x.count) as `count` FROM (SELECT `subprob`, `place`, count(*)as `count` FROM tbl_map_info INNER JOIN tbl_zipcode ON tbl_map_info.zipCode = tbl_zipcode.zipCode WHERE `referenceID` LIKE 'A2023%' GROUP BY tbl_zipcode.zipCode ORDER BY `count` DESC) x GROUP BY x.subprob ORDER BY `count` DESC LIMIT 20";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
              $count[] = $row['count'];
            }
            return $count;
        }

        public function chartDataCampus(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT DISTINCT campus FROM tbl_map_info WHERE `referenceID` LIKE 'A2023%'";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
            // var_dump($rows);
            // die();
            foreach($rows as $row){
              $campus[] = $row['campus'];
            }
            return $campus;
        }

        public function chartDataCampusCount(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT count(*) AS `count` from tbl_map_info WHERE `referenceID` LIKE 'A2023%' group by campus ORDER BY `tbl_map_info`.`campus` DESC";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
            // var_dump($rows);
            // die();
            foreach($rows as $row){
              $campus[] = $row['count'];
            }
            return $campus;
        }

}

//WHERE `referenceID` LIKE 'A2022%'
//SELECT DISTINCT LEFT(`referenceID`, 5) FROM `tbl_map_info`