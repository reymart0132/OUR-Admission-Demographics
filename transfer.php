<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';
$view = new view;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://kit.fontawesome.com/ee4d206cc2.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="resource/css/transfer.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <title>Ecle Transfer Form</title>
    <link rel="icon" type="image/x-icon" href="resource/img/icon.ico" />
  </head>
  <body>
    <header>

        <nav class="navbar navbar-expand-md navbar-dark">
          <img src="resource/img/ceulogo2.png" class="img-fluid logo">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="icons ml-auto">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="https:/www.facebook.com/theCEUofficial/"><i class="fab fa-facebook-f"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/ceuofficial/"><i class="fab fa-instagram"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="https://twitter.com/ceumalolos"><i class="fab fa-twitter"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>

      <div class="container mt-5">
        <div class="row">
          <div class="content px-4 m-auto justify-content-center">
            <div class="col-md pt-3 text-center">
              <h1 class="head-text">Ecle Transfer Form</h1>
            </div>

          <?php
          if(!empty($_POST)){
            $insert= new insert($_POST['fname'], $_POST['lname'], $_POST['mname'], $_POST['studID'], $_POST['email'], $_POST['contact'], $_POST['course'], $_POST['bday'], $_POST['year'], $_POST['university'], $_POST['reason']);
            $insert->insertApplication();
          }
          ?>

          <form method="POST">
            <div class="row mt-5 g-3">
              <!---Firstname--->
              <div class="col-md-4">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" name="fname" class="form-control" pattern="[a-zA-Z\s]*$" oninvalid="this.setCustomValidity('Please use characters!')" oninput="this.setCustomValidity('')" id="firstName" required>
              </div>

              <!---Middlename--->
              <div class="col-md-4">
                <label for="middleName" class="form-label">Middle Name</label>
                <input type="text" name="mname" class="form-control" pattern="[a-zA-Z\s]*$" oninvalid="this.setCustomValidity('Please use characters!')" oninput="this.setCustomValidity('')" id="middleName">
              </div>

              <!---Lastname--->
              <div class="col-md-4">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" name="lname" class="form-control" pattern="[a-zA-Z\s]*$" oninvalid="this.setCustomValidity('Please use characters!')" oninput="this.setCustomValidity('')" id="lastName" required>
              </div>

              <!---Student Number--->
              <div class="col-md-4">
                <label for="studentNumber" class="form-label">Student Number</label>
                <input type="text" name="studID" class="form-control" pattern="[0-9]{4}-[0-9]{5}" oninvalid="this.setCustomValidity('Please follow the pattern (XXXX-XXXXX)')" oninput="this.setCustomValidity('')" id="studentNumber" required>
              </div>

              <!---Email--->
              <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninvalid="this.setCustomValidity('Please follow the pattern sample@gmail.com')" oninput="this.setCustomValidity('')" id="email" required>
              </div>

              <!---Contact Number--->
              <div class="col-md-4">
                <label for="contactNumber" class="form-label">Contact Number</label>
                <input type="text" name="contact" class="form-control" pattern="09[0-9]{9}" oninvalid="this.setCustomValidity('Please follow the pattern 0XXXXXXXXXX')" oninput="this.setCustomValidity('')" id="contactNumber" required>
              </div>

              <!---Course/Degree--->
              <div class="col-md-8">
                <label form="course" class="form-label">Course/Degree</label>
                <select id="course" name="course" class="form-select form-control" data-live-search="true" required>
                <?php $view->courseSP2();?>
                </select>
              </div>

              <div class="col-md-4">
                <label for="bday" class="form-label">Birthday</label>
                <input type="date" name="bday" class="form-control" id="bday" required>
              </div>

              <!---Year Level--->
              <div class="col-md-4">
                <label for="yearLevel" class="form-label">Year Last Enrolled</label>
                <input type="text" name="year" class="form-control" pattern="20[0-9]{2}" oninvalid="this.setCustomValidity('Please follow the pattern 20XX')" oninput="this.setCustomValidity('')" id="yearLevel" required>
              </div>

              <!---Transfer School--->
              <div class="col-md-4">
                <label for="university" class="form-label">Transferring School</label>
                <select id="university" name="university" class="form-select form-control" data-live-search="true" required>
                <?php $view->university();?>
                </select>
              </div>

              <!---Reason--->
              <div class="col-md-4">
                <label for="reason" class="form-label">Reason</label>
                <select id="reason" name="reason" class="form-select form-control" data-live-search="true" required>
                <?php $view->reason();?>
                </select>
              </div>

              <div class="col-md my-4 text-center">
                <div>
                  <button type="submit" class="button-submit btn-info">Submit</button>
                </div>
                <div>
                  <button onclick="location.href='index.php'" class="button-back">Back</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</header>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->

</body>
</html>
