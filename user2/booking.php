<?php
session_start();

if (!isset($_SESSION['email'])) {
  header("location: login.php");
}

include '../connectdb.php';
$varUID = $_SESSION['uid'];
$varEmail = $_SESSION['email'];
$varPID = $_SESSION['pid'];

$result = mysqli_query($connect, "SELECT * FROM booking where uid = '$varUID' order by created_at desc");
//$result2 = mysqli_query($connect, "SELECT * FROM booking where pid = '' order by created_at desc");


$result2 = mysqli_query($connect, "SELECT * FROM booking where pid = '$varPID' order by created_at desc");

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
          <form action="usersearch.php" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" required>
              <div class="input-group-append">
                <button class="btn btn-info" type="submit">
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
              <a class="nav-link" href="professor.php">Professor</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="webboard.php">Webboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="booking.php">Booking</a>
            </li>

            <?php
            if ($_SESSION['level'] == 'u') {
              echo '<li class="nav-item">
                              <a class="nav-link" href="professor_reg.php">Reg Prof</a>
                              </li>';
            }
            ?>


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
                <?php
                if ($_SESSION['level'] == 'p') {
                  echo '<img src="data:image/jpeg;base64,' . base64_encode($_SESSION['picture']) . '" class= "img-profile rounded-circle" height="50px" width="50px" class="img-thumnail" />';
                } else {
                  echo '<img class="img-profile rounded-circle" src="../img/profile.jpg">';
                }
                ?>
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">&nbsp;&nbsp;
                  <?php if (isset($_SESSION['email'])) {
                    echo $_SESSION['email'];
                  } ?>
                </span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php
                if ($_SESSION['level'] == 'p') { ?>
                  <a class="dropdown-item" href="profile.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a><?php
                    }
                      ?>
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
                <a class="dropdown-item" href="logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>            
          </ul>
        </nav>
        <!-- End of Topbar -->


        <!-- Begin Page Content -->
        <div class="container-fluid" style="min-height: 100vh;">
          <!-- Outer Row -->
          <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-12 col-md-9">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <?php
                    if ($_SESSION['level'] == 'u') {
                      if ($result->num_rows == 0) {
                        echo "<div class='card-body'> 
                          <div class='text-center'>
                          <h1>No Booking</h1>
                          </div>
                          </div>";
                      }
                      while ($row = mysqli_fetch_array($result)) :
                    ?>
                        <div class="card card-white mb-5 shadow">
                          <div class="card-body">
                            <ul class="list-unstyled">
                              <li class="position-relative booking">
                                <div class="media">
                                  <?php
                                  $dbpid = $row['pid'];
                                  $dbprof = mysqli_query($connect, "SELECT * FROM professor WHERE pid = '$dbpid'");
                                  while ($prof = mysqli_fetch_array($dbprof)) :
                                  ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="media-body">
                                      <h5 class="mb-4">
                                        <?php
                                        echo $row['subject'];
                                        ?>
                                        <?php if ($row['status'] == '2') { ?>
                                          <span class="badge badge-success mx-3">success</span>
                                        <?php } else if ($row['status'] == '1') { ?>
                                          <span class="badge badge-danger mx-3">Reject</span>
                                        <?php } else if ($row['status'] == '0') { ?>
                                          <span class="badge badge-warning mx-3">Pending</span>
                                        <?php } ?>
                                      </h5>
                                      <div class="mb-3">
                                        <span class="mr-2 d-block d-sm-inline-block mb-5 mb-sm-0"> Details:</span>
                                        <?php echo $row['detail']; ?>
                                      </div>
                                      <div class="mb-3">
                                        <span class="mr-2 d-block d-sm-inline-block mb-5 mb-sm-0"> Date:</span>
                                        <?php $date = date_create($row['date']);
                                        echo date_format($date, 'd-F-Y'); ?>
                                      </div>
                                      <div class="mb-3">
                                        <span class="mr-2 d-block d-sm-inline-block mb-5 mb-sm-0"> Time:</span>
                                        <?php echo $row['time']; ?>
                                      </div>
                                      <div class="mb-3">
                                        <span class="mr-2 d-block d-sm-inline-block mb-5 mb-sm-0"> Created:</span>
                                        <?php $date = date_create($row['created']); echo date_format($date, 'd-F-Y H:i a'); ?>
                                      </div>
                                    </div>
                                    <div class="col-3 float-right">
                                      <div class="float=left">
                                        <?php
                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($prof['picture']) . '" class= "img-profile rounded-circle" height="80px" width="80px" class="img-thumnail" />';
                                        ?>
                                      </div>                                     
                                      <br>
                                      <div class="float-left">
                                        <?php echo $prof['title'] . " " . $prof['firstname'] . " " . $prof['lastname']; ?>
                                      </div>
                                    </div>                                    
                                  <?php
                                  endwhile;
                                  ?>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                    <?php
                      endwhile;
                    }
                    ?>
                    <?php
                    if ($_SESSION['level'] == 'p') {
                      if ($result2->num_rows == 0) {
                        echo "<div class='card-body'> 
                          <div class='text-center'>
                          <h1>No Booking</h1>
                          </div>
                          </div>";
                      }
                      while ($row = mysqli_fetch_array($result2)) :
                    ?>

                        <div class="card card-white mb-5 shadow">
                          <div class="card-body">
                            <ul class="list-unstyled">
                              <li class="position-relative booking">
                                <div class="media">
                                  <?php
                                  $dbpid = $row['uid'];
                                  $dbprof = mysqli_query($connect, "SELECT * FROM user WHERE uid = '$dbpid'");
                                  while ($prof = mysqli_fetch_array($dbprof)) :
                                  ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="media-body float-left">
                                      <h5 class="mb-4">
                                        <?php
                                        echo $row['subject'];
                                        ?>
                                        <?php if ($row['status'] == '2') { ?>
                                          <span class="badge badge-success mx-3">success</span>
                                        <?php } else if ($row['status'] == '1') { ?>
                                          <span class="badge badge-danger mx-3">Reject</span>
                                        <?php } else if ($row['status'] == '0') { ?>
                                          <span class="badge badge-warning mx-3">Pending</span>
                                        <?php } ?>
                                      </h5>
                                      <div class="mb-3">
                                        <span class="mr-2 d-block d-sm-inline-block mb-5 mb-sm-0"> Details:</span>
                                        <?php echo $row['detail']; ?>
                                      </div>
                                      <div class="mb-3">
                                        <span class="mr-2 d-block d-sm-inline-block mb-5 mb-sm-0"> Date:</span>
                                        <?php echo $row['date']; ?>
                                      </div>
                                      <div class="mb-3">
                                        <span class="mr-2 d-block d-sm-inline-block mb-5 mb-sm-0"> Time:</span>
                                        <?php echo $row['time']; ?>
                                      </div>
                                      <div class="mb-3">
                                        <span class="mr-2 d-block d-sm-inline-block mb-5 mb-sm-0"> From:</span>
                                        <?php echo $prof['email']; ?>
                                      </div>
                                      <div class="mb-3">
                                        <span class="mr-2 d-block d-sm-inline-block mb-5 mb-sm-0"> Created:</span>
                                        <?php echo $row['created_at']; ?>
                                      </div>
                                    </div>

                                    <?php if ($row['status'] == '0') { ?>
                                      <div class="msg-img text-center float-right">

                                        <div class="float-left">
                                          <form action="approve.php" method="post">
                                            <div class="form-group">
                                              <input type="hidden" class="form-control" name="status" value="2">
                                            </div>
                                            <input type="hidden" name="bid" value="<?php echo $row['bid']; ?>">
                                            <button type="submit" class="btn btn-success btn-icon-split"><span class="icon text-white-100">
                                                <i class="fas fa-check">
                                                  <span class="text">Accept</span></i>
                                              </span></button>
                                          </form>
                                        </div>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <div class="float-right">

                                          <form action="approve.php" method="post">
                                            <div class="form-group">
                                              <input type="hidden" class="form-control" name="status" value="1">
                                            </div>
                                            <input type="hidden" name="bid" value="<?php echo $row['bid']; ?>">
                                            <button type="submit" class="btn btn-danger btn-icon-split"><span class="icon text-white-100">
                                                <i class="fas fa-trash">
                                                  <span class="text">Reject</span></i>
                                              </span></button>
                                          </form>
                                        </div>

                                        <!-- <div>
                                        <?php
                                        echo '<img class="img-profile rounded-circle" height="80px" width="80px" class="img-thumnail"src="../img/profile.jpg">';
                                        //echo '<img src="data:image/jpeg;base64,' . base64_encode($prof['picture']) . '" class= "img-profile rounded-circle" height="80px" width="80px" class="img-thumnail" />';
                                        ?>
                                      </div>
                                      <br>
                                      <div>
                                        <?php echo $prof['email']; ?>
                                      </div> -->

                                      </div>
                                    <?php } ?>

                                  <?php
                                  endwhile;
                                  ?>
                                </div>
                              </li>

                            </ul>

                          </div>
                        </div>

                    <?php
                      endwhile;
                    }
                    ?>

                  </div>
                </div>
              </div>

            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

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