<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';
isLogin();
$viewtable = new viewtable();
$user = new user();
isRegistrar($user->data()->groups);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="resource/css/styledash.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
    <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

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
    
          <div class="list-group list-group-flush my-3">
            <a class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-question-circle me-2"></i>Pendings <?php echo '<span class="badge badge-danger">'
            .$viewtable->viewTotalRegistrar(). '</span>';  ?>
            </a>

            <div class="item">
              <a class="sub-btn" href="registrar.php"><i class="fa-solid fa-house-user"></i>Dashboard</a>
            </div>

            <!-- requests -->
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-tag"></i>Requests<i class="fas fa-chevron-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="regs-req-tr.php" name="Rtransfer" class="sub-item border-bottom" value="Transfer">
                  Transfer <?php echo '<span class="badge badge-danger">'.$viewtable->viewCountPendingRegistrarTR(). '</span>';?> </a> 
                <a href="regs-req-gd.php" name="Rgraduate" class="sub-item" value="Graduate">
                  Graduate <?php echo '<span class="badge badge-danger">'.$viewtable->viewCountPendingRegistrarGD(). '</span>';?> </a> 
              </div>
            </div>

            <!-- approved -->
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-thumbs-up"></i>Approved<i class="fas fa-chevron-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="regs-app-tr.php" name="Atransfer" class="sub-item border-bottom" value="Transfer">Transfer</a>
                <a href="regs-app-gd.php" name="Agraduate" class="sub-item" value="Graduate">Graduate</a>
              </div>
            </div>

            <!-- hold -->
            <div class="item pb-3 border-bottom">
              <a class="sub-btn"><i class="fa-sharp fa-solid fa-pause"></i>On Hold<i class="fas fa-chevron-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="regs-hld-tr.php" name="Atransfer" class="sub-item border-bottom" value="Transfer">Transfer</a>
                <a href="regs-hld-gd.php" name="Agraduate" class="sub-item" value="Graduate">Graduate</a>
              </div>
            </div>

            <script type="text/javascript">
              $(document).ready(function(){
                  $('.sub-btn').click(function(){
                      $(this).next('.sub-menu').slideToggle();
                      $(this).find('.dropdown').toggleClass('rotate');
                  });
              });
            </script>
          </div>
        <div class="sch-img text-center">
            <img class="sch-logo" src='resource/img/<?php deptImage(); ?>'>
        </div>
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
                    <li><a href="changepasswordRegistrar.php" class="dropdown-item">Setting</a></li>
                    <li><a href="logout.php" class="dropdown-item">Logout</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>

          <div class="container-fluid p-5">
            <div class="row">
              <div class="col-md p-5 content">
                <?php
    
                  $viewtable->viewHoldTableRegistrarGraduate();
                
                ?>
              <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
              <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
              <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
              <script type="text/javascript">
                $(document).ready( function () {
                  $('#scholartable').DataTable({
                    "ordering": false
                  });
                });
                
              </script>
              </div>
            </div>
        </div>
      </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
      var el = document.getElementById("wrapper")
      var toggleButton = document.getElementById("menu-toggle")

      toggleButton.onclick = function(){
        el.classList.toggle("toggled")
      }
    </script>
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
  </body>
</html>
