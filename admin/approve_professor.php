<?php include '../connectdb.php';

?>

<?php
session_start();

if (!isset($_SESSION['email'])) {
  header("location: login.php");
}

include '../connectdb.php';

$result = mysqli_query($connect, "SELECT * FROM professor WHERE status = '0'");

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

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-cogs"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Engineering Clinic</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-book"></i>
          <span>Approve Booking</span></a>
      </li>



      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="table_professor.php">Professor</a>
            <a class="collapse-item" href="table_user.php">User</a>
            <a class="collapse-item" href="table_booking.php">Booking</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="aWebboard.php">
          <i class="fas fa-newspaper"></i>
          <span>Webboard</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="approve_professor.php">
          <i class="fas fa-user-check"></i>
          <span>Approve Professor</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form action="search.php" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" required>
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

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
                  <?php if (isset($_SESSION['email'])) { ?>
                  <?php echo $_SESSION['email'];
                  } ?>
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
        <div class="container fluid justify content center">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Approve Professor</h1>

          <div class="row">

            <div class="col-lg-10">

              <!-- Brand Buttons -->
              
              <?php

                if ($result->num_rows == 0){
                  echo "<div class='card-body'> 
                  <div class='text-center'>
                  <h1>No Professor Register</h1>
                  </div>
                  </div>";
                }
              while ($row = mysqli_fetch_array($result)) :
                if ($row['status'] == "0") {
              ?>
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <!-- <h6 class="m-0 font-weight-bold text-primary"><?php echo "(" . $row['pid'] . ")" ?></h6> -->
                    </div>
                    <div class="card-body">

                    <div class = "col-sm-12 float-left">
                    <form>
                      <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Professor</label>
                        <div class="col-md-7 mb-2">
                          <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['picture']) . '"  class= "img-profile rounded" height="100px" width="100px"/>'; ?>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label"></label>
                        <div class="col-md-7 mb-2">
                          <input type="text" class="form-control" id="colFormLabel" value = "<?php echo $row['title'] . " " . $row['firstname'] . " " . $row['lastname'] ?>" readonly>
                        </div>
                      </div>

                      <?php
                       $dbuid = $row['user_id'];
                       $dbuser = mysqli_query($connect, "SELECT * FROM user WHERE uid = '$dbuid'");
                       while ($user = mysqli_fetch_array($dbuser)) : ?>
                      <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-md-7 mb-2">
                          <input type="email" class="form-control" id="colFormLabel" value = "<?php echo $user['email'] ?>" readonly>
                        </div>
                      </div>
                      <?php endwhile; ?>

                      <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Expert</label>
                        <div class="col-md-7 mb-2">
                          <textarea  class="form-control" id="colFormLabel" value = "<?php echo $row['expert']?>" readonly rows="3"><?php echo $row['expert']?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Convenient date and time</label>
                        <div class="col-md-7 mb-2">
                          <input type="text" class="form-control" id="colFormLabel" value = "<?php echo $row['free_time']?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Position</label>
                        <div class="col-md-7 mb-2">
                          <input type="text" class="form-control" id="colFormLabel" value = "<?php echo $row['position'] ?>" readonly>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Office</label>
                        <div class="col-md-7 mb-2">
                          <input type="text" class="form-control" id="colFormLabel" value = "<?php echo $row['office'] ?>" readonly>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Created at</label>
                        <div class="col-md-7 mb-2">
                          <input type="text" class="form-control" id="colFormLabel" value = "<?php echo $row['created_at'] ?>" readonly>
                        </div>
                      </div>

                      </form>
                      </div>

                      <div class = "float-right">
                      
                      <div class = "float-left">
                      <form action="approve2.php" method="post">
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="status" value="1">
                          <input type="hidden" name="uid" value="<?php echo $row['user_id']; ?>">
                          <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                        </div>
                        <button type="submit2" class="btn btn-success btn-icon-split"><span class="icon text-white-100">
                            <i class="fas fa-check">
                              <span class="text">Accept</span></i>
                          </span></button>
                      </form>
                      </div>
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <div class = "float-right">
                      <form action="approve2.php" method="post">
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="status" value="-1">
                        </div>
                        <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                        <button type="submit1" class="btn btn-danger btn-icon-split"><span class="icon text-white-100">
                            <i class="fas fa-trash">
                              <span class="text">Reject</span></i>
                          </span></button>
                      </form>
                      </div>

                      </div>
                    </div>
                  </div>
              <?php }
              endwhile; ?>
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

<script>
  $(document).ready(function() {
    $('#insert').click(function() {
      var image_name = $('#image').val();
      if (image_name == '') {
        alert("Please Select Image");
        return false;
      } else {
        var extension = $('#image').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
          alert('Invalid Image File');
          $('#image').val('');
          return false;
        }
      }
    });
  });
</script>