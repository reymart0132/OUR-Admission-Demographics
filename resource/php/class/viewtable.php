<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/maps/resource/php/class/core/init.php';
require_once 'config.php';

class viewtable extends config{

public function viewRequestTableRegistrarTransfer(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `registrarclearance`='PENDING' AND `libraryclearance`='APPROVED' AND `departmentclearance`='APPROVED' AND `accountingclearance`='APPROVED' AND `registrarclearance` = 'PENDING' AND `studentType` = 'Transfer' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for Registrar (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th style='width: 100px;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }
  $id = $data["id"];
  $studType = $data["studentType"];
  $libraryC = $data["libraryclearance"];
  $libraryR = $data["libraryremarks"];
  $deptC = $data["departmentclearance"];
  $deptR = $data["departmentremarks"];
  $acctC = $data["accountingclearance"];
  $acctR = $data["accountingremarks"];
  $regC = $data["registrarclearance"];
  $regR = $data["registrarremarks"];
  echo "<td>
          <button class='btn btn-sm btn-block btn-success d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#regsModal$id' data-id='$id'><i class='fa-solid fa-check'></i> Sign</button>";
  echo   "<button class='btn btn-sm btn-block btn-warning d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#regsHold$id' data-id='$id'><i class='fa-solid fa-triangle-exclamation'></i> Hold</button>
          <a href='viewRegistrar.php?id=$data[id]' class='btn my-1 btn-sm d-block btn-info actions' data-toggle='tooltip' data-placement='top' title='View info'><i class='fa-solid fa-eye'></i> Info</a>";
          include "modals.php";
  echo "</td>";

  echo "</tr>";
  }
  echo "</table>";


}

public function viewRequestTableRegistrarGraduate(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `registrarclearance`='PENDING' AND `libraryclearance`='APPROVED' AND `departmentclearance`='APPROVED' AND `accountingclearance`='APPROVED' AND `registrarclearance` = 'PENDING' AND `studentType` = 'Graduate' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for Registrar (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th style='width: 100px;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }

  $id = $data["id"];
  $studType = $data["studentType"];
  $libraryC = $data["libraryclearance"];
  $libraryR = $data["libraryremarks"];
  $deptC = $data["departmentclearance"];
  $deptR = $data["departmentremarks"];
  $acctC = $data["accountingclearance"];
  $acctR = $data["accountingremarks"];
  $regC = $data["registrarclearance"];
  $regR = $data["registrarremarks"];
  echo "<td>
          <button class='btn btn-sm btn-block btn-success d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#regsModal$id' data-id='$id'><i class='fa-solid fa-check'></i> Sign</button>";
  echo   "<button class='btn btn-sm btn-block btn-warning d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#regsHold$id' data-id='$id'><i class='fa-solid fa-triangle-exclamation'></i> Hold</button>
          <a href='viewRegistrar.php?id=$data[id]' class='btn my-1 btn-sm d-block btn-info actions' data-toggle='tooltip' data-placement='top' title='View info'><i class='fa-solid fa-eye'></i> Info</a>";
          include "modals.php";
  echo "</td>";

  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableRegistrarTransfer(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `registrarclearance`='APPROVED' AND `studentType` = 'Transfer' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by Registrar (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Number</th>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[studentID]</td>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }


  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableRegistrarGraduate(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `registrarclearance`='APPROVED' AND `studentType` = 'Graduate' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by Registrar (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Number</th>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[studentID]</td>";
  echo "<td>$data[fname] $data[mname] $data[lname]</td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }


  echo "</tr>";
  }
  echo "</table>";

}

public function viewHoldTableRegistrarTransfer(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `registrarclearance`='ON HOLD' AND `studentType` = 'Transfer' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> On Hold by Registrar (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th style='width: 100px;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }

  $id = $data["id"];
  $studType = $data["studentType"];
  $libraryC = $data["libraryclearance"];
  $libraryR = $data["libraryremarks"];
  $deptC = $data["departmentclearance"];
  $deptR = $data["departmentremarks"];
  $acctC = $data["accountingclearance"];
  $acctR = $data["accountingremarks"];
  $regC = $data["registrarclearance"];
  $regR = $data["registrarremarks"];
  echo "<td>
          <button class='btn btn-sm btn-block btn-success d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#regsModal$id' data-id='$id'><i class='fa-solid fa-check'></i> Sign</button>";
  echo   "<button class='btn btn-sm btn-block btn-warning d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#regsHold$id' data-id='$id'><i class='fa-solid fa-triangle-exclamation'></i> Hold</button>
          <a href='viewRegistrar.php?id=$data[id]' class='btn my-1 btn-sm d-block btn-info actions' data-toggle='tooltip' data-placement='top' title='View info'><i class='fa-solid fa-eye'></i> Info</a>";
          include "modals.php";
  echo "</td>";

  echo "</tr>";
  }
  echo "</table>";

}

public function viewHoldTableRegistrarGraduate(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `registrarclearance`='ON HOLD' AND `studentType` = 'Graduate' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> On Hold by Registrar (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th style='width: 100px;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }

  $id = $data["id"];
  $studType = $data["studentType"];
  $libraryC = $data["libraryclearance"];
  $libraryR = $data["libraryremarks"];
  $deptC = $data["departmentclearance"];
  $deptR = $data["departmentremarks"];
  $acctC = $data["accountingclearance"];
  $acctR = $data["accountingremarks"];
  $regC = $data["registrarclearance"];
  $regR = $data["registrarremarks"];
  echo "<td>
          <button class='btn btn-sm btn-block btn-success d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#regsModal$id' data-id='$id'><i class='fa-solid fa-check'></i> Sign</button>";
  echo   "<button class='btn btn-sm btn-block btn-warning d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#acctHold$id' data-id='$id'><i class='fa-solid fa-triangle-exclamation'></i> Hold</button>
          <a href='viewRegistrar.php?id=$data[id]' class='btn my-1 btn-sm d-block btn-info actions' data-toggle='tooltip' data-placement='top' title='View info'><i class='fa-solid fa-eye'></i> Info</a>";
          include "modals.php";
  echo "</td>";

  echo "</tr>";
  }
  echo "</table>";

}

public function viewRequestTableAccountingTransfer(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `accountingclearance`='PENDING' AND `studentType` = 'Transfer' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for Accounting (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th style='width: 100px;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }

  $id = $data["id"];
  $studType = $data["studentType"];
  $libraryC = $data["libraryclearance"];
  $libraryR = $data["libraryremarks"];
  $deptC = $data["departmentclearance"];
  $deptR = $data["departmentremarks"];
  $acctC = $data["accountingclearance"];
  $acctR = $data["accountingremarks"];
  $regC = $data["registrarclearance"];
  $regR = $data["registrarremarks"];
  echo "<td>
          <button class='btn btn-sm btn-block btn-success d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#acctModal$id' data-id='$id'><i class='fa-solid fa-check'></i> Sign</button>";
  echo   "<button class='btn btn-sm btn-block btn-warning d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#acctHold$id' data-id='$id'><i class='fa-solid fa-triangle-exclamation'></i> Hold</button>
          <a href='viewAccounting.php?id=$data[id]' class='btn my-1 btn-sm d-block btn-info actions' data-toggle='tooltip' data-placement='top' title='View info'><i class='fa-solid fa-eye'></i> Info</a>";
          include "modals.php";
  echo "</td>";

  echo "</tr>";
  }
  echo "</table>";

}

public function viewRequestTableAccountingGraduate(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `accountingclearance`='PENDING' AND `studentType` = 'Graduate' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for Accounting (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th style='width: 100px;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }

  $id = $data["id"];
  $studType = $data["studentType"];
  $libraryC = $data["libraryclearance"];
  $libraryR = $data["libraryremarks"];
  $deptC = $data["departmentclearance"];
  $deptR = $data["departmentremarks"];
  $acctC = $data["accountingclearance"];
  $acctR = $data["accountingremarks"];
  $regC = $data["registrarclearance"];
  $regR = $data["registrarremarks"];
  echo "<td>
          <button class='btn btn-sm btn-block btn-success d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#acctModal$id' data-id='$id'><i class='fa-solid fa-check'></i> Sign</button>";
  echo   "<button class='btn btn-sm btn-block btn-warning d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#acctHold$id' data-id='$id'><i class='fa-solid fa-triangle-exclamation'></i> Hold</button>
          <a href='viewAccounting.php?id=$data[id]' class='btn my-1 btn-sm d-block btn-info actions' data-toggle='tooltip' data-placement='top' title='View info'><i class='fa-solid fa-eye'></i> Info</a>";
          include "modals.php";
  echo "</td>";

  echo "</tr>";
  }
  echo "</table>";
}

public function viewApproveTableAccountingTransfer(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `accountingclearance`='APPROVED' AND `studentType` = 'Transfer' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by Accounting (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Number</th>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[studentID]</td>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }


  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableAccountingGraduate(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `accountingclearance`='APPROVED' AND `studentType` = 'Graduate' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by Accounting (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Number</th>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[studentID]</td>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }


  echo "</tr>";
  }
  echo "</table>";

}

public function viewHoldTableAccountingTransfer(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `accountingclearance`='ON HOLD' AND `studentType` = 'Transfer' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> On Hold by Accounting (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th style='width: 100px;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }

  $id = $data["id"];
  $studType = $data["studentType"];
  $libraryC = $data["libraryclearance"];
  $libraryR = $data["libraryremarks"];
  $deptC = $data["departmentclearance"];
  $deptR = $data["departmentremarks"];
  $acctC = $data["accountingclearance"];
  $acctR = $data["accountingremarks"];
  $regC = $data["registrarclearance"];
  $regR = $data["registrarremarks"];
  echo "<td>
          <button class='btn btn-sm btn-block btn-success d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#acctModal$id' data-id='$id'><i class='fa-solid fa-check'></i> Sign</button>";
  echo   "<button class='btn btn-sm btn-block btn-warning d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#acctHold$id' data-id='$id'><i class='fa-solid fa-triangle-exclamation'></i> Hold</button>
          <a href='viewAccounting.php?id=$data[id]' class='btn my-1 btn-sm d-block btn-info actions' data-toggle='tooltip' data-placement='top' title='View info'><i class='fa-solid fa-eye'></i> Info</a>";
          include "modals.php";
  echo "</td>";

  echo "</tr>";
  }
  echo "</table>";

}

public function viewHoldTableAccountingGraduate(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `accountingclearance`='ON HOLD' AND `studentType` = 'Graduate' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> On Hold by Accounting (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th style='width: 100px;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }

  $id = $data["id"];
  $studType = $data["studentType"];
  $libraryC = $data["libraryclearance"];
  $libraryR = $data["libraryremarks"];
  $deptC = $data["departmentclearance"];
  $deptR = $data["departmentremarks"];
  $acctC = $data["accountingclearance"];
  $acctR = $data["accountingremarks"];
  $regC = $data["registrarclearance"];
  $regR = $data["registrarremarks"];
  echo "<td>
          <button class='btn btn-sm btn-block btn-success d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#acctModal$id' data-id='$id'><i class='fa-solid fa-check'></i> Sign</button>";
  echo   "<button class='btn btn-sm btn-block btn-warning d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#acctHold$id' data-id='$id'><i class='fa-solid fa-triangle-exclamation'></i> Hold</button>
          <a href='viewAccounting.php?id=$data[id]' class='btn my-1 btn-sm d-block btn-info actions' data-toggle='tooltip' data-placement='top' title='View info'><i class='fa-solid fa-eye'></i> Info</a>";
          include "modals.php";
  echo "</td>";

  echo "</tr>";
  }
  echo "</table>";

}

public function viewRequestTableDepartmentTransfer(){
  $user = new user();
  $department = $user->data()->colleges;
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `departmentclearance`='PENDING' AND `school` = '$department' AND `studentType` = 'Transfer' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for $department (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th style='width: 100px;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }

  $id = $data["id"];
  $studType = $data["studentType"];
  $libraryC = $data["libraryclearance"];
  $libraryR = $data["libraryremarks"];
  $deptC = $data["departmentclearance"];
  $deptR = $data["departmentremarks"];
  $acctC = $data["accountingclearance"];
  $acctR = $data["accountingremarks"];
  $regC = $data["registrarclearance"];
  $regR = $data["registrarremarks"];
  echo "<td>
          <button class='btn btn-sm btn-block btn-success d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#deanModal$id' data-id='$id'><i class='fa-solid fa-check'></i> Sign</button>";
  echo   "<button class='btn btn-sm btn-block btn-warning d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#deanHold$id' data-id='$id'><i class='fa-solid fa-triangle-exclamation'></i> Hold</button>
          <a href='viewDean.php?id=$data[id]' class='btn my-1 btn-sm d-block btn-info actions' data-toggle='tooltip' data-placement='top' title='View info'><i class='fa-solid fa-eye'></i> Info</a>";
          include "modals.php";
  echo "</td>";

  echo "</tr>";
  }
  echo "</table>";

}

public function viewRequestTableDepartmentGraduate(){
  $user = new user();
  $department = $user->data()->colleges;
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `departmentclearance`='PENDING' AND `school` = '$department' AND `studentType` = 'Graduate' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for $department (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th style='width: 100px;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }

  $id = $data["id"];
  $studType = $data["studentType"];
  $libraryC = $data["libraryclearance"];
  $libraryR = $data["libraryremarks"];
  $deptC = $data["departmentclearance"];
  $deptR = $data["departmentremarks"];
  $acctC = $data["accountingclearance"];
  $acctR = $data["accountingremarks"];
  $regC = $data["registrarclearance"];
  $regR = $data["registrarremarks"];
  echo "<td>
          <button class='btn btn-sm btn-block btn-success d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#deanModal$id' data-id='$id'><i class='fa-solid fa-check'></i> Sign</button>";
  echo   "<button class='btn btn-sm btn-block btn-warning d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#deanHold$id' data-id='$id'><i class='fa-solid fa-triangle-exclamation'></i> Hold</button>
          <a href='viewDean.php?id=$data[id]' class='btn my-1 btn-sm d-block btn-info actions' data-toggle='tooltip' data-placement='top' title='View info'><i class='fa-solid fa-eye'></i> Info</a>";
          include "modals.php";
  echo "</td>";

  echo "</tr>";
  }
  echo "</table>";
  


}

public function viewApproveTableDepartmentTransfer(){
  $user = new user();
  $department = $user->data()->colleges;
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `departmentclearance`='APPROVED' AND `school` = '$department' AND `studentType` = 'Transfer' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by $department (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Number</th>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[studentID]</td>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }


  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableDepartmentGraduate(){
  $user = new user();
  $department = $user->data()->colleges;
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `departmentclearance`='APPROVED' AND `school` = '$department' AND `studentType` = 'Graduate' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by $department (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 13px'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Number</th>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 12px'>";
  echo "<td>$data[studentID]</td>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }


  echo "</tr>";
  }
  echo "</table>";

}

public function viewHoldTableDepartmentTransfer(){
  $user = new user();
  $department = $user->data()->colleges;
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `departmentclearance`='ON HOLD' AND `school` = '$department' AND `studentType` = 'Transfer' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> On-Hold by $department (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th style='width: 100px;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }

  $id = $data["id"];
  $studType = $data["studentType"];
  $libraryC = $data["libraryclearance"];
  $libraryR = $data["libraryremarks"];
  $deptC = $data["departmentclearance"];
  $deptR = $data["departmentremarks"];
  $acctC = $data["accountingclearance"];
  $acctR = $data["accountingremarks"];
  $regC = $data["registrarclearance"];
  $regR = $data["registrarremarks"];
  echo "<td>
          <button class='btn btn-sm btn-block btn-success d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#deanModal$id' data-id='$id'><i class='fa-solid fa-check'></i> Sign</button>";
  echo   "<button class='btn btn-sm btn-block btn-warning d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#deanHold$id' data-id='$id'><i class='fa-solid fa-triangle-exclamation'></i> Hold</button>
          <a href='viewDean.php?id=$data[id]' class='btn my-1 btn-sm d-block btn-info actions' data-toggle='tooltip' data-placement='top' title='View info'><i class='fa-solid fa-eye'></i> Info</a>";
          include "modals.php";
  echo "</td>";

  echo "</tr>";
  }
  echo "</table>";

}

public function viewHoldTableDepartmentGraduate(){
  $user = new user();
  $department = $user->data()->colleges;
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `departmentclearance`='ON HOLD' AND `school` = '$department' AND `studentType` = 'Graduate' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> On-Hold by $department (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th style='width: 100px;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }

  $id = $data["id"];
  $studType = $data["studentType"];
  $libraryC = $data["libraryclearance"];
  $libraryR = $data["libraryremarks"];
  $deptC = $data["departmentclearance"];
  $deptR = $data["departmentremarks"];
  $acctC = $data["accountingclearance"];
  $acctR = $data["accountingremarks"];
  $regC = $data["registrarclearance"];
  $regR = $data["registrarremarks"];
  echo "<td>
          <button class='btn btn-sm btn-block btn-success d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#deanModal$id' data-id='$id'><i class='fa-solid fa-check'></i> Sign</button>";
  echo   "<button class='btn btn-sm btn-block btn-warning d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#deanHold$id' data-id='$id'><i class='fa-solid fa-triangle-exclamation'></i> Hold</button>
          <a href='viewDean.php?id=$data[id]' class='btn my-1 btn-sm d-block btn-info actions' data-toggle='tooltip' data-placement='top' title='View info'><i class='fa-solid fa-eye'></i> Info</a>";
          include "modals.php";
  echo "</td>";

  echo "</tr>";
  }
  echo "</table>";

}

public function viewRequestTableLibraryTransfer(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `libraryclearance`='PENDING' AND `studentType` = 'Transfer' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for Library (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th style='width: 100px;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }

  $id = $data["id"];
  $studType = $data["studentType"];
  $libraryC = $data["libraryclearance"];
  $libraryR = $data["libraryremarks"];
  $deptC = $data["departmentclearance"];
  $deptR = $data["departmentremarks"];
  $acctC = $data["accountingclearance"];
  $acctR = $data["accountingremarks"];
  $regC = $data["registrarclearance"];
  $regR = $data["registrarremarks"];
  echo "<td>
          <button class='btn btn-sm btn-block btn-success d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#librModal$id' data-id='$id'><i class='fa-solid fa-check'></i> Sign</button>";
  echo   "<button class='btn btn-sm btn-block btn-success d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#librHold$id' data-id='$id'><i class='fa-solid fa-triangle-exclamation'></i> Hold</a>
          <a href='viewLibrary.php?id=$data[id]' class='btn my-1 btn-sm d-block btn-info actions' data-toggle='tooltip' data-placement='top' title='View info'><i class='fa-solid fa-eye'></i> Info</a>";
          include "modals.php";
  echo "</td>";

  echo "</tr>";
  }
  echo "</table>";
}

public function viewRequestTableLibraryGraduate(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `libraryclearance`='PENDING' AND `studentType` = 'Graduate' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for Library (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th style='width: 100px;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }
  $id = $data["id"];
  $studType = $data["studentType"];
  $libraryC = $data["libraryclearance"];
  $libraryR = $data["libraryremarks"];
  $deptC = $data["departmentclearance"];
  $deptR = $data["departmentremarks"];
  $acctC = $data["accountingclearance"];
  $acctR = $data["accountingremarks"];
  $regC = $data["registrarclearance"];
  $regR = $data["registrarremarks"];                 
  echo "<td>
          <button class='btn btn-sm btn-block btn-success d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#librModal$id' data-id='$id'><i class='fa-solid fa-check'></i> Sign</button>";
  echo   "<button class='btn btn-sm btn-block btn-warning d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#librHold$id' data-id='$id'><i class='fa-solid fa-triangle-exclamation'></i> Hold</button>
          <a href='viewLibrary.php?id=$data[id]' class='btn my-1 btn-sm d-block btn-info actions' data-toggle='tooltip' data-placement='top' title='View info'><i class='fa-solid fa-eye'></i> Info</a>";
          include "modals.php";
  echo "</td>";

  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableLibraryTransfer(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `libraryclearance`='APPROVED' AND `studentType` = 'Transfer' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by Library (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Number</th>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[studentID]</td>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }


  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableLibraryGraduate(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `libraryclearance`='APPROVED' AND `studentType` = 'Graduate' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by Library (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Number</th>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[studentID]</td>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }


  echo "</tr>";
  }
  echo "</table>";

}

public function viewHoldTableLibraryTransfer(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `libraryclearance`='ON HOLD' AND `studentType` = 'Transfer' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> On Hold by Library (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th style='width: 100px;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }

  $id = $data["id"];
  $studType = $data["studentType"];
  $libraryC = $data["libraryclearance"];
  $libraryR = $data["libraryremarks"];
  $deptC = $data["departmentclearance"];
  $deptR = $data["departmentremarks"];
  $acctC = $data["accountingclearance"];
  $acctR = $data["accountingremarks"];
  $regC = $data["registrarclearance"];
  $regR = $data["registrarremarks"];                 
  echo "<td>
          <button class='btn btn-sm btn-block btn-success d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#librModal$id' data-id='$id'><i class='fa-solid fa-check'></i> Sign</button>";
  echo   "<button class='btn btn-sm btn-block btn-warning d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#librHold$id' data-id='$id'><i class='fa-solid fa-triangle-exclamation'></i> Hold</button>
          <a href='viewLibrary.php?id=$data[id]' class='btn my-1 btn-sm d-block btn-info actions' data-toggle='tooltip' data-placement='top' title='View info'><i class='fa-solid fa-eye'></i> Info</a>";
          include "modals.php";
  echo "</td>";

  echo "</tr>";
  }
  echo "</table>";
}

public function viewHoldTableLibraryGraduate(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `libraryclearance`='ON HOLD' AND `studentType` = 'Graduate' AND `expiry` = 'NO' ORDER BY `dateReq` ASC";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> On Hold by Library (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 12px'>";
  echo "<thead class='thead-dark'>";
  echo "<th style='width: 250px;'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Date Requested</th>";
  echo "<th>Student Type</th>";
  echo "<th>Reference ID</th>";
  echo "<th>Library</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th style='width: 100px;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr style='font-size: 13px'>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[dateReq]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[referenceID]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[libraryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }elseif($data["departmentclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }elseif($data["accountingclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='text-secondary' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }elseif($data["registrarclearance"] === "ON HOLD"){
    echo "<td><p class='text-warning' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }else {
    echo "<td><p class='text-success' style='font-weight:bold'>$data[registrarclearance]</p></td>";
  }

  $id = $data["id"];
  $studType = $data["studentType"];
  $libraryC = $data["libraryclearance"];
  $libraryR = $data["libraryremarks"];
  $deptC = $data["departmentclearance"];
  $deptR = $data["departmentremarks"];
  $acctC = $data["accountingclearance"];
  $acctR = $data["accountingremarks"];
  $regC = $data["registrarclearance"];
  $regR = $data["registrarremarks"];                 
  echo "<td>
          <button class='btn btn-sm btn-block btn-success d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#librModal$id' data-id='$id'><i class='fa-solid fa-check'></i> Sign</button>";
  echo   "<button class='btn btn-sm btn-block btn-warning d-block actions' id='btn' type='button' data-bs-toggle='modal' data-bs-target='#librHold$id' data-id='$id'><i class='fa-solid fa-triangle-exclamation'></i> Hold</button>
          <a href='viewLibrary.php?id=$data[id]' class='btn my-1 btn-sm d-block btn-info actions' data-toggle='tooltip' data-placement='top' title='View info'><i class='fa-solid fa-eye'></i> Info</a>";
          include "modals.php";
  echo "</td>";

  echo "</tr>";
  }
  echo "</table>";
}

public function viewReports(){

  echo "<h3 class='text-center'>Reports of all Students</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='reports' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%' style='font-size: 16px'>";
  echo "<thead class='thead-dark'>";
  echo "<a href='reportsDownload.php' style='font-size: 19px; color:blue'>Export table</a>";

  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms`";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);

  $sql2 = "SHOW columns FROM `ecle_forms`";
  $data2 = $con->prepare($sql2);
  $data2->execute();
  $header = $data2->fetchAll(PDO::FETCH_ASSOC);
  
  foreach($header as $head){
    echo "<th>$head[Field]</th>";
  }
  echo "</thead>";

  foreach($result as $data){
    echo "<tr style='font-size: 12px'>";
    echo "<td>$data[id]</td>";
    echo "<td>$data[lname]</td>";
    echo "<td>$data[fname]</td>";
    echo "<td>$data[mname]</td>";
    echo "<td>$data[semester]</td>";
    echo "<td>$data[sy]</td>";
    echo "<td>$data[dateReq]</td>";
    echo "<td>$data[school]</td>";
    echo "<td>$data[schoolABBR]</td>";
    echo "<td>$data[studentID]</td>";
    echo "<td>$data[email]</td>";
    echo "<td>$data[contact]</td>";
    echo "<td>$data[bday]</td>";
    echo "<td>$data[course]</td>";
    echo "<td>$data[courseABBR]</td>";
    echo "<td>$data[year]</td>";
    echo "<td>$data[transferredSchool]</td>";
    echo "<td>$data[reason]</td>";
    echo "<td>$data[studentType]</td>";
    echo "<td>$data[schoolType]</td>";
    echo "<td>$data[referenceID]</td>";
    echo "<td>$data[libraryclearance]</td>";
    echo "<td>$data[libraryremarks]</td>";
    echo "<td>$data[librarydate]</td>";
    echo "<td>$data[departmentclearance]</td>";
    echo "<td>$data[departmentremarks]</td>";
    echo "<td>$data[departmentdate]</td>";
    echo "<td>$data[accountingclearance]</td>";
    echo "<td>$data[accountingremarks]</td>";
    echo "<td>$data[accountingdate]</td>";
    echo "<td>$data[registrarclearance]</td>";
    echo "<td>$data[registrarremarks]</td>";
    echo "<td>$data[registrardate]</td>";
    echo "<td>$data[expiry]</td>";
    echo "</tr>";
  }
  echo "</table>";
}

public function viewTotalRegistrar(){
  $con = $this->con();
  $sql = "SELECT COUNT(*) FROM `ecle_forms` WHERE `registrarclearance` = 'PENDING' AND `accountingclearance` = 'APPROVED' AND `libraryclearance` = 'APPROVED' AND `departmentclearance` = 'APPROVED' AND `expiry` = 'NO'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchColumn();
  return $result;
}

public function viewCountPendingRegistrarTR(){
  $con = $this->con();
  $sql = "SELECT COUNT(*) FROM `ecle_forms` WHERE `registrarclearance` = 'PENDING' AND `accountingclearance` = 'APPROVED' AND `libraryclearance` = 'APPROVED' AND `departmentclearance` = 'APPROVED' AND `expiry` = 'NO' AND `studentType` = 'Transfer'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchColumn();
  return $result;
}

public function viewCountPendingRegistrarGD(){
  $con = $this->con();
  $sql = "SELECT COUNT(*) FROM `ecle_forms` WHERE `registrarclearance` = 'PENDING' AND `accountingclearance` = 'APPROVED' AND `libraryclearance` = 'APPROVED' AND `departmentclearance` = 'APPROVED' AND `expiry` = 'NO' AND `studentType` = 'Graduate'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchColumn();
  return $result;
}

public function viewTotalAccounting(){
  $con = $this->con();
  $sql = "SELECT COUNT(*) FROM `ecle_forms` WHERE `accountingclearance` = 'PENDING' AND `expiry` = 'NO'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchColumn();
  return $result;
}

public function viewCountPendingAccountingTR(){
  $con = $this->con();
  $sql = "SELECT COUNT(*) FROM `ecle_forms` WHERE `accountingclearance` = 'PENDING' AND `studentType` = 'Transfer' AND `expiry` = 'NO'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchColumn();
  return $result;
}

public function viewCountPendingAccountingGD(){
  $con = $this->con();
  $sql = "SELECT COUNT(*) FROM `ecle_forms` WHERE `accountingclearance` = 'PENDING' AND `studentType` = 'Graduate' AND `expiry` = 'NO'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchColumn();
  return $result;
}

public function viewTotalLibrary(){
  $con = $this->con();
  $sql = "SELECT COUNT(*) FROM `ecle_forms` WHERE `libraryclearance` = 'PENDING' AND `expiry` = 'NO'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchColumn();
  return $result;
}

public function viewCountPendingLibraryTR(){
  $con = $this->con();
  $sql = "SELECT COUNT(*) FROM `ecle_forms` WHERE `libraryclearance` = 'PENDING' AND `studentType` = 'Transfer' AND `expiry` = 'NO'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchColumn();
  return $result;
}

public function viewCountPendingLibraryGD(){
  $con = $this->con();
  $sql = "SELECT COUNT(*) FROM `ecle_forms` WHERE `libraryclearance` = 'PENDING' AND `studentType` = 'Graduate' AND `expiry` = 'NO'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchColumn();
  return $result;
}

public function viewTotalDean(){
  $con = $this->con();
  $user = new user();
  $department = $user->data()->username;
  $sql = "SELECT COUNT(*) FROM `ecle_forms` WHERE `departmentclearance` = 'PENDING' AND `schoolABBR` = '$department' AND `expiry` = 'NO'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchColumn();
  return $result;
}

public function viewCountPendingDeanTR(){
  $con = $this->con();
  $user = new user();
  $department = $user->data()->username;
  $sql = "SELECT COUNT(*) FROM `ecle_forms` WHERE `departmentclearance` = 'PENDING' AND `schoolABBR` = '$department' AND `studentType` = 'Transfer' AND `expiry` = 'NO'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchColumn();
  return $result;
}

public function viewCountPendingDeanGD(){
  $con = $this->con();
  $user = new user();
  $department = $user->data()->username;
  $sql = "SELECT COUNT(*) FROM `ecle_forms` WHERE `departmentclearance` = 'PENDING' AND `schoolABBR` = '$department' AND `studentType` = 'Graduate' AND `expiry` = 'NO'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchColumn();
  return $result;
}

public function viewTransferredSchoolNames() {
  $con = $this->con();
  $sql = "SELECT transferredSchool, COUNT(transferredSchool) AS quantity FROM ecle_forms WHERE semester = '1' AND sy = '2022-2023' AND transferredSchool != 'NULL' GROUP BY transferredSchool";
  $data= $con->prepare($sql);
  $data->execute();
  $names[] = array();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  foreach($result as $row){
    $names[] = $row['transferredSchool'];
  }
  unset($names[0]);
  return $names;
  }

public function viewTransferredSchoolTotal() {
  $con = $this->con();
  $sql = "SELECT transferredSchool, COUNT(transferredSchool) AS quantity FROM ecle_forms WHERE semester = '1' AND sy = '2022-2023' AND transferredSchool != '' GROUP BY transferredSchool";
  $data= $con->prepare($sql);
  $data->execute();
  $numbers[] = array();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  foreach($result as $row){
    $numbers[] = $row['quantity'];
  }
  unset($numbers[0]);
  return $numbers;
  }

public function viewReasonNames(){
  $con = $this->con();
  $sql = "SELECT reason, COUNT(reason) AS quantity FROM ecle_forms WHERE semester = '1' AND sy = '2022-2023' AND reason != 'NULL' GROUP BY reason";
  $data= $con->prepare($sql);
  $data->execute();
  $reasons[] = array();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  foreach($result as $row){
    $reasons[] = $row['reason'];
  }
  unset($reasons[0]);
  return $reasons;
  }

public function viewReasonTotal(){
  $con = $this->con();
  $sql = "SELECT reason, COUNT(reason) AS quantity FROM ecle_forms WHERE semester = '1' AND sy = '2022-2023' AND reason != 'NULL' GROUP BY reason";
  $data= $con->prepare($sql);
  $data->execute();
  $total[] = array();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  foreach($result as $row){
    $total[] = $row['quantity'];
  }
  unset($total[0]);
  return $total;
  }
}
?>