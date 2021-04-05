<?php
include '../connectdb.php';
session_start();

if (!isset($_SESSION['email'])) {
  header("location: login.php");
}

$varUID = $_SESSION['uid'];

//user
$sql_u = "SELECT * FROM user where uid = '$varUID'";
$query_u = mysqli_query($connect, $sql_u);
$result_u = mysqli_fetch_assoc($query_u);

//question
$sql = "SELECT * FROM webboard WHERE wid='{$_GET['wid']}' ";
$query = mysqli_query($connect, $sql);
$result = mysqli_fetch_assoc($query);

//picture
// $sqli = "SELECT pic FROM webboard WHERE id='{$_GET['id']}'";
// $resulti = mysqli_query($connect, $sqli);
// $rowi = mysqli_fetch_assoc($resulti);

// answer
$sql_a = "SELECT * FROM accept WHERE wid='{$_GET['wid']}'";
$query_a = mysqli_query($connect, $sql_a);
$rows_a = mysqli_num_rows($query_a);

// update view
$sql_u = "UPDATE webboard SET view=view+1 WHERE wid='{$_GET['wid']}' ";
mysqli_query($connect, $sql_u);
?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="en" />
  <title>Engineering Clinic</title>
  <style type="text/css">
    body {
      font-size: 13px;
    }
  </style>
</head>

<body>
</body>

</html>

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
                      <button class="btn btn-info" type="button">
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

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <div class="container mt-5 mb-5">
            <div class="row d-flex justify-content-center">
              <div class="col-md-12">
                <div class="comment-section">
                  <div class="card p-3 border-blue mt-3 shadow"> <span class="dots"></span>
                    <div class="d-flex justify-content-between mt-2">
                      <div class="d-flex flex-row">
                        <div class="user-image"> <img src="../img/profile.jpg" width="40" class="rounded-circle"> </div>
                        &nbsp;&nbsp;
                        <div class="d-flex flex-column">
                          <h6 class="mb-0"><?php echo $result_u['user_name']; ?></h6> <span class="date"><?php $date = date_create($row['created']); echo date_format($date, 'd-F-Y'); ?></span>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <h3 class="text-primary"><?php echo $result['topic']; ?></h3>
                    <p class="content"><?php echo $result['detail']; ?></p>
                    <?php
                    if ($result['pic'] != NULL) {
                      echo '<img src="data:image/jpeg;base64,' . base64_encode($result['pic']) . '" class="img-profile" height="auto" width="50%"/>';
                    }
                    ?>
                    <hr>
                    <div class="form">
                      <form id="add_answer" name="add_answer" method="post" action="add_answer.php">
                        <input type="hidden" name="wid" value="<?php echo $result['wid']; ?>">
                        <input type="hidden" name="uid" value="<?php echo $result_u['uid']; ?>">
                        <input type="hidden" name="user_name" value="<?php echo $result_u['user_name']; ?>">
                        <input type="hidden" name="email" value="<?php echo $result_u['email']; ?>">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Write a comment..." name="comment" id="comment" required>
                          <div class="input-group-append">
                            <input class="btn btn-info btn-sm ms-1" type="submit" name="submit" value="Send"></input>
                          </div>
                        </div>
                      </form>
                    </div>
                    <?php
                    if ($rows_a > 0) {
                      $i = 1;
                      while ($result_a = mysqli_fetch_assoc($query_a)) {
                    ?>
                        <hr>
                        <h6 class="text-primary"><?php echo $result_a['email']; ?></h6>
                        <?php echo nl2br($result_a['comment']); ?>
                    <?php
                      }
                    }
                    ?>
                  </div>
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
              <a class="btn btn-info" href="login.html">Logout</a>
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

<?php
mysqli_close($connect);
