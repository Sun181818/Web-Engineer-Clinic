<?php
    session_start();

    if (!isset($_SESSION['email'])) {
        header("location: login.php");
    }

    include '../connectdb.php';

    $result = mysqli_query($connect,"SELECT * FROM booking ");

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Engineer Clinic</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/Engineer-Clinic.min.css" rel="stylesheet">

</head>

<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button> -->

          <a class="sidebar-brand d-flex align-items-center justify-content-center text-info" href="index.php">
            <div class="sidebar-brand-icon rotate-n-15 text-info">
                <i class="fas fa-cogs"></i>
            </div>
            <div class="sidebar-brand-text mx-3 text-info">Engineering Clinic</div>
          </a>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-info" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="webboard.php">Webboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="booking.php">Booking</a>
          </li>

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="img-profile rounded-circle" src="../img/profile.jpg">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">&nbsp;&nbsp;
                    <?php if(isset($_SESSION['email'])) { ?>
                    <?php echo $_SESSION['email']; }?>
                    </span>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <!-- <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                  </a> -->
                  <!-- <div class="dropdown-divider"></div> -->
                  <a class="dropdown-item" href="logout.php" >
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">2</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header bg-info">
                  Notifications
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-info">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <span class="font-weight-bold">New booking request BID 003 !</span>
                    <div class="small text-gray-500">December 12, 2020</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <span class="font-weight-bold">New booking request BID 004 !</span>
                    <div class="small text-gray-500">December 7, 2020</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>


          </ul>

        </nav>
        <!-- End of Topbar -->


      <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Page Heading -->
                <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active" data-interval="10000">
                    <div class="bg-warning text-dark d-block w-100" ></div>
                      <!-- <img src="../img/kmitl.jpg" class="d-block w-100" alt="..." height="400"> -->
                    </div>
                    <div class="carousel-item" data-interval="2000">

                    </div>
                    <div class="carousel-item">

                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>


                <div class="card-deck ">

                  <div class="card text-center" style="max-width: 16rem;">
                    <!-- <img class="card-img-top" src="../img/CE.png" alt="Card image cap" width="277" height="400"> -->
                    <div class="card-body ">
                      <span style="font-size: 100px; color: bg-info">
                        <i class="fas fa-laptop-code "></i>
                      </span>
                      <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                      <a href="booking.php" class="btn btn-info">Computer Engineering</a>
                    </div>
                  </div>

                  <div class="card text-center" style="max-width: 18rem;">
                    <!-- <img class="card-img-top" src="../img/CE.png" alt="Card image cap" width="277" height="400"> -->
                    <div class="card-body">
                    <span style="font-size: 100px; color: bg-info">
                      <i class="fas fa-bolt"></i>
                      </span>
                      <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                      <a href="#" class="btn btn-info">Electrical Engineering</a>
                    </div>
                  </div>

                  <div class="card text-center" style="max-width: 18rem;">
                    <!-- <img class="card-img-top" src="../img/CE.png" alt="Card image cap" width="277" height="400"> -->
                    <div class="card-body">
                    <span style="font-size: 100px; color: bg-info">
                      <i class="fas fa-building"></i>
                      </span>
                      <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                      <a href="#" class="btn btn-info">Civil Engineering</a>
                    </div>
                  </div>

                  <div class="card text-center" style="max-width: 18rem;">
                    <!-- <img class="card-img-top" src="../img/CE.png" alt="Card image cap" width="277" height="400"> -->
                    <div class="card-body">
                    <span style="font-size: 100px; color: bg-info">
                    <i class="fas fa-wrench"></i>
                      </span>
                      <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                      <a href="#" class="btn btn-info">Mechanical Engineering</a>
                    </div>
                  </div>

                  <div class="card text-center" style="max-width: 18rem;">
                    <!-- <img class="card-img-top" src="../img/CE.png" alt="Card image cap" width="277" height="400"> -->
                    <div class="card-body">
                    <span style="font-size: 100px; color: bg-info">
                    <i class="fas fa-satellite-dish"></i>
                      </span>
                      <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                      <a href="#" class="btn btn-info">Telecom Engineering</a>
                    </div>
                  </div>
                </div>

        </div>

      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/Engineer-Clinic.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>