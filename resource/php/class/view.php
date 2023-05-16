<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/maps/resource/php/class/core/init.php';
require_once 'config.php';

class view extends config{

        public function collegeSP2(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `collegeschool` WHERE `state` = 'active'";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $row) {
                  echo '<option data-tokens=".'.$row->college_school.'." value="'.$row->college_school.'">'.$row->college_school.'</option>';
                  echo 'success';
                }
        }
        public function getdata(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT x.subprob, sum(x.count) as `count` FROM (SELECT `subprob`,count(*)as `count` FROM tbl_map_info INNER JOIN tbl_zipcode ON tbl_map_info.zipCode = tbl_zipcode.zipCode GROUP BY tbl_zipcode.zipCode ORDER BY `count` DESC) x GROUP BY x.subprob";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                 // ['ph-au', 10],['ph-bu', 10],['ph-pm', 10],['ph-ba', 10],['ph-ne', 10],['ph-tr', 10],['ph-zm', 10],['ph-7017', 10],['ph-7018', 10],
                 echo "['".$row['subprob']."',".$row['count']."],";
            }
        }


        public function courseSP2(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `courseschool` WHERE `status` = 'active'";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $row) {
                  echo '<option data-tokens=".'.$row->course.'." value="'.$row->course.'">'.$row->course.'</option>';
                  echo 'success';
                }
        }

        public function semesterChoose(){
          echo '<option>Choose Semester</option>';
          echo '<option data-tokens="1" value="1">1</option>';
          echo '<option data-tokens="2" value="2">2</option>';
          echo '<option data-tokens="Summer" value="Summer">Summer</option>';
        }

        public function university(){
          $config = new config;
          $con = $config->con();
          $sql = "SELECT * FROM `university`";
          $data = $con-> prepare($sql);
          $data ->execute();
          $rows =$data-> fetchAll(PDO::FETCH_OBJ);
              foreach ($rows as $row) {
                echo '<option data-tokens=".'.$row->university.'." value="'.$row->university.'">'.$row->university.'</option>';
                echo 'success';
              }
      }

        public function reason(){
          echo '<option data-tokens="Continuation of Study" value="Continuation of Study">Continuation of Study</option>';
          echo '<option data-tokens="Financial Problem" value="Financial Problem">Financial Problem</option>';
          echo '<option data-tokens="Change of Major" value="Change of Major">Change of Major</option>';
          echo '<option data-tokens="Family Issues" value="Family Issues">Family Issues</option>';
          echo '<option data-tokens="Change of Residence" value="Change of Residence">Change of Residence</option>';
          echo '<option data-tokens="University Quality Concern" value="University Quality Concern">University Quality Concern</option>';
          echo '<option data-tokens="International Transfer" value="International Transfer">International Transfer</option>';
          echo '<option data-tokens="Others" value="Others">Others</option>';

        }

        public function getdpSRA(){
            $user = new user();
            return $user->data()->dp;
        }

        public function getMmSRA(){
            $user = new user();
             return $user->data()->mm;
        }


        public function chartDataLocation(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT x.subprob, x.place, sum(x.count) as `count` FROM (SELECT `subprob`, `place`, count(*)as `count` FROM tbl_map_info INNER JOIN tbl_zipcode ON tbl_map_info.zipCode = tbl_zipcode.zipCode GROUP BY tbl_zipcode.zipCode ORDER BY `count` DESC) x GROUP BY x.subprob ORDER BY `count` DESC LIMIT 20";
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
            $sql = "SELECT x.subprob, x.place, sum(x.count) as `count` FROM (SELECT `subprob`, `place`, count(*)as `count` FROM tbl_map_info INNER JOIN tbl_zipcode ON tbl_map_info.zipCode = tbl_zipcode.zipCode GROUP BY tbl_zipcode.zipCode ORDER BY `count` DESC) x GROUP BY x.subprob ORDER BY `count` DESC LIMIT 20";
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
            $sql = "SELECT DISTINCT campus FROM tbl_map_info";
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
            $sql = "SELECT count(*) AS `count` from tbl_map_info group by campus ORDER BY `tbl_map_info`.`campus` DESC";
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
