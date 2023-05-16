<?php

class graduate extends config{
    public $studentNumber, $lname;

    public function __construct($studentNumber, $lname){
        $this->studentNumber = $studentNumber;
        $this->lname = ucwords($lname);
    }

    public function viewGraduate(){
        $con = $this->con();
        $sql = "SELECT * FROM `ecle_forms` WHERE `studentID` = '$this->studentNumber' AND `lname` = '$this->lname'";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        if (empty($result)) {
            echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                    <b>Error:</b> Invalid Credentials Entered.
                  </div>';
        }
        else {
            foreach ($result as $data) {
                if($data['studentType'] === "Transfer"){
                    echo "Please refer to the transfer section of reference checking for transferring students.";
                } else {
                    if($data['registrarclearance'] === "APPROVED" && $data['expiry'] === 'NO'){
                        echo "<h3 class='text-center font-weight-bold'> Student Information </h3>";
                        echo "<div class='table-responsive'>";
                        echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
                        echo "<thead class='thead-dark' style='font-size: medium'>";
                        echo "<th>Department</th>";
                        echo "<th>Library</th>";
                        echo "<th>Accounting</th>";
                        echo "<th>Registrar</th>";
                        echo "</thead>";
                        echo "<br>";
                        echo "<p> <small>Student Name:</small>&emsp;<strong> $data[lname], $data[fname] $data[mname]</strong></p>";
                        // echo "<p> <small>First Name:</small>&emsp;<strong> $data[fname] </strong> &emsp;&emsp; <small>Last Name:</small>&emsp;<strong>$data[lname]</strong>  &emsp;&emsp;<small>Middle Name: </small>&emsp;<strong>$data[mname]</strong></p>";
                        echo "<p> <small>Course:&emsp;</small><strong> $data[course]</strong></p>";
                        echo "<p> <small>Email:&emsp;</small><strong> $data[email]</strong> </p><hr>";
                        echo "<tr class='text-white'>";
                        echo "<td style='font-size: large'>$data[departmentclearance]</td>";
                        echo "<td style='font-size: large'>$data[libraryclearance] </td>";
                        echo "<td style='font-size: large'>$data[accountingclearance]</td>";
                        echo "<td style='font-size: large'>$data[registrarclearance]</td>";
                        echo "<h5><a href='formDownload.php?referenceID=$data[referenceID]' class='btn btn-sm btn-outline-light'><i class='fa-solid fa-file-arrow-down'></i> DOWNLOAD</a> the copy of your Clearance Form</h5><br>";
                        echo "</table>";
                        echo "</div>";
                        break;
                    }
                    else if($data['expiry'] === 'YES'){
                        echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                                <b>Error!</b> Your form has expired due to unattended remarks set, please contact a Techer-In-Charge!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                    }
                    else {
                        echo "<h3 class='text-center font-weight-bold'> Student Information </h3>";
                        echo "<div class='table-responsive'>";
                        echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
                        echo "<thead class='thead-dark' style='font-size: medium'>";
                        echo "<th>Department</th>";
                        echo "<th>Library</th>";
                        echo "<th>Accounting</th>";
                        echo "<th>Registrar</th>";
                        echo "</thead>";
                        echo "<br>";
                        echo "<p> <small>Student Name:</small>&emsp;<strong> $data[lname], $data[fname] $data[mname]</strong></p>";
                        // echo "<p> <small>First Name:</small>&emsp;<strong> $data[fname] </strong> &emsp;&emsp; <small>Last Name:</small>&emsp;<strong>$data[lname]</strong>  &emsp;&emsp;<small>Middle Name: </small>&emsp;<strong>$data[mname]</strong></p>";
                        echo "<p> <small>Course:&emsp;</small><strong> $data[course]</strong></p>";
                        echo "<p> <small>Email:&emsp;</small><strong> $data[email]</strong> </p>";
                        echo "<hr><h3 class='text-center font-weight-bold'> Clearance Status </h3><br>";
                        echo "<tr class='text-white'>";
                        echo "<td style='font-size: large'>$data[departmentclearance]</td>";
                        echo "<td style='font-size: large'>$data[libraryclearance] </td>";
                        echo "<td style='font-size: large'>$data[accountingclearance]</td>";
                        echo "<td style='font-size: large'>$data[registrarclearance]</td>";
                        echo "</table>";
                        echo "</div>";
                        break;
                    }
                }
            }
        }
        

    }
}
?>