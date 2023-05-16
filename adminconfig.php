<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/maps/resource/php/class/core/init.php';
isLogin();
$viewtable = new viewtable();
$user = new user();
isRegistrar($user->data()->groups);
$import = new import();
$view = new view();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="resource/css/adminConfigStyle.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
    <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>

    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="resource/img/icon.ico" />
  </head>
  <body>
    <header>
      <div class="d-flex" id="wrapper">
        <div class="bg-white" id="sidebar-wrapper">
          <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
            <img src="resource/img/logo.jpg" class="img-fluid logo">
          </div>
          <!-- <form action="" method="POST"> -->
          <div class="list-group list-group-flush my-3">
            <!-- dashboard -->
            <div class="item"><a href="registrar.php"><i class="fa-solid fa-gauge-high"></i>Dashboard</a>
            </div>

            <!-- <script type="text/javascript">
              $(document).ready(function(){
                  $('.sub-btn').click(function(){
                      $(this).next('.sub-menu').slideToggle();
                      $(this).find('.dropdown').toggleClass('rotate');
                  });
              });
            </script> -->

            <!-- <a class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-question-circle me-2"></i>Pendings <?php echo '<span class="badge badge-danger">'
            .$viewtable->viewTotalRegistrar(). '</span>';  ?>
            </a> -->

          </div>
          </form>


        </div>

        <div id="page-content-wrapper">
          <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 border-bottom">
            <div class="d-flex align-items-center">
              <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupporteContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav  ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle second-text fw-bold" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user me-2"></i> <?php echo $user->data()->username ?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a href="adminconfig.php" class="dropdown-item">Config</a></li>
                    <li><a href="changepasswordRegistrar.php" class="dropdown-item">Setting</a></li>
                    <li><a href="sendmails.php" class="dropdown-item">Send Mails</a></li>
                    <li><a href="logout.php" class="dropdown-item">Logout</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>

          <div class="container pt-5">
            <div class="row">
              <div class="col col-md-12 head">
                <div class="float-left">
                  <!-- <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm')"><i class="fa-solid fa-plus mr-2"></i>Import</a> -->
                  
                </div>
              </div>

              <div class="col col-md-12 text-center" id="importFrm">
              <?php $import->insertGraduate(); ?>
                <form action="" method="post" enctype="multipart/form-data"><br>
                  <input type="file" name="file">
                  <button type="submit" class="btn btn-outline-primary btn-sm" name="importSubmit"><i class="fa-solid fa-file-import"></i> Import</button>
                  <a href="registrar.php" class="btn btn-info"><i class="fa-solid fa-person-walking-arrow-right"></i> Exit</a>
                </form>
              </div>

              <!-- <script>
                function formToggle(ID){
                  var element = document.getElementById(ID);
                  if(element.style.display === "none"){
                    element.style.display = "block";
                  }else{
                    element.style.display = "none";
                  }
                }
              </script> -->
            </div>
          </div>
          <div class="container-fluid main p-5">
            <div class="row justify-content-md-center next">
              <!-- <div class="col-md-6 pt-3 content"> -->
              <?php
                // if(!empty($_POST['semester']) || !empty($_POST['sy'])){
                //   $update = new update($_POST['semester'], $_POST['sy']);
                //   $update->updateSemester();
                //   $update->updateSchoolyear();
                // }
              ?>
                <!-- <form method="post"> -->

                  <!-- <div class="col-md">
                    <h4>Import Names of Graduating Students</h4><br>
                    <label for="firstName" class="form-label">Semester</label>
                    <select name="semester" id="semester" class="form-select form-control" data-live-search="true">
                    <?php $view->semesterChoose();?>
                    </select>
                  </div> -->

                  <!-- <div class="col-md pt-5">
                    <label for="firstName" class="form-label">School Year</label>
                    <input type="text" name="sy" class="form-control" pattern="[0-9]{4}-[0-9]{4}" oninvalid="this.setCustomValidity('Please follow the pattern (XXXX-XXXX)')" oninput="this.setCustomValidity('')">
                  </div> -->

                  <!-- <div class="col-md pt-3 text-center">
                    <button type="submit" class="btn btn-dark">Submit</button>
                  </div> -->
                <!-- </form> -->
              <!-- </div> -->
            </div>
            
          </div>
        </div>
      </div>
    </header>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col">
            <p class="ft pt-3">
              Centro Escolar University || R.Bolasoc | J.Espiritu | D.Calalang | C.DelaCruz | L.Pradez | D.Prado | J. Anatalio
            </p>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
      var el = document.getElementById("wrapper")
      var toggleButton = document.getElementById("menu-toggle")

      toggleButton.onclick = function(){
        el.classList.toggle("toggled")
      }
    </script>
  </body>
</html>
