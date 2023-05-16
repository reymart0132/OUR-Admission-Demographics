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
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
    <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="resource/img/icon.ico" />
  </head>
  <body>
    <header>
      <div class="d-flex" id="wrapper">
        <div class="bg-white" id="sidebar-wrapper">
          <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
            <img src="images/logo.jpg" class="img-fluid logo">
          </div>
          <div class="list-group list-group-flush my-3">
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold  border-bottom">
              <i class="fas fa-tachometer-alt me-2"></i>Dashboard
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
              <i class="fas fa-thin fa-tag me-2"></i></i>Requests
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
              <i class="fa-solid fa-arrow-right-from-bracket"></i></i>Logout
            </a>

          </div>

        </div>

        <div id="page-content-wrapper">
          <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 border-bottom">
            <div class="d-flex align-items-center">
              <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
              <h2 class="fs-2 m-0"> Dashboard</h2>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupporteContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav  ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle second-text fw-bold" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user me-2"></i> Daniel Prado
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a href="#" class="dropdown-item">Settings</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>

          <div class="container-fluid p-5">
            <div class="row">
              <div class="col-md p-5 content ">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped"  id="asd">
                    <thead class="thead-dark">
                    <tr>
                      <th>STUDENT NAME</th>
                      <th>COURSE</th>
                      <th>TYPE</th>
                      <th>SCIENCE/NON-SCIENCE</th>
                      <th>LIBRARY</th>
                      <th>LABORATORY</th>
                      <th>DEPARTMENT</th>
                      <th>ACCOUNTING</th>
                      <th>REGISTRAR</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>asdasda</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                    </tr>
                    <tr>
                      <td>asdasda</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                    </tr>
                    <tr>
                      <td>asdasda</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                    </tr>
                    <tr>
                      <td>asdasda</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                    </tr>
                    <tr>
                      <td>asdasda</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                    </tr>
                    <tr>
                      <td>asdasda</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                    </tr>
                    <tr>
                      <td>asdasda</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                    </tr>
                    <tr>
                      <td>asdasda</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                      <td>asdasd</td>
                    </tr>
                  </tbody>
                  </table>
                  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
                  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
                    <script type="text/javascript">
                      $(document).ready(function () {
                          $('#asd').DataTable();
                      });
                    </script>

                  </div>
              </div>
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
  </body>
</html>
