<?php
session_start();

if (!isset($_SESSION['email'])) {
  header("location: login.php");
}

include '../connectdb.php';
$varUID = $_SESSION['uid'];
$varEmail = $_SESSION['email'];

$stmt = $db->prepare("SELECT * FROM professor WHERE user_id = '$varUID' limit 1");
$stmt->bindParam("upid", $pid);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $dbpid = $row['pid'];
  $dbtitle = $row['title'];
  $dbfirstname = $row['firstname'];
  $dblastname = $row['lastname'];
  $dbexpert = $row['expert'];
  $dbposition = $row['position'];
  $dboffice = $row['office'];
  $dbpicture = $row['picture'];
  $dbcreated_at = $row['created_at'];
}

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
              <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
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
                    <span class="font-weight-bold">It's almost time for an subject ... !</span>
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
                    <span class="font-weight-bold">Cancel booking from ...!</span>
                    <div class="small text-gray-500">December 7, 2020</div>
                  </div>
                </a>

                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <span class="font-weight-bold">Successfully booking subject ... !</span>
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

          <!-- Outer Row -->
          <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-12 col-md-9">

              <div class="container">
                <div class="main-body">

                  <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($dbpicture) . '" class= "img-profile rounded-circle" height="150px" width="150px" />'; ?>
                          </div>
                          <div class="mt-3">
                            <h5 class="text-center">About me</h5>
                            <p class="text-secondary mb-1"></p>
                            <p class="text-muted font-size-sm"></p>
                            <!--button class="btn btn-primary">Edit Profile</button-->
                            <!-- <button class="btn btn-outline-primary">Message</button> -->

                            <!-- edit -->
                            <div class="text-center">
                              <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update_profile_Modal<?php echo $dbpid; ?>" data-whatever="@mdo">Edit Profile</button>
                            </div>
                            <div class="modal fade" id="update_profile_Modal<?php echo $dbpid; ?>" tabindex="-1" role="dialog" aria-labelledby="update_profile_ModalLabel<?php echo $dbpid; ?>" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="update_profile_ModalLabel<?php echo $dbpid; ?>">Edit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form action="profile_edit.php" method="post">
                                    <div class="modal-body">
                                      <div class="form-group">
                                        <label for="title" class="col-form-label">Title:</label>
                                        <input type="text" class="form-control" name="title" value="<?php echo $dbtitle; ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="user_name" class="col-form-label">First Name:</label>
                                        <input type="text" class="form-control" name="firstname" value="<?php echo $dbfirstname; ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="user_name" class="col-form-label">Last Name:</label>
                                        <input type="text" class="form-control" name="lastname" value="<?php echo $dblastname; ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="position" class="col-form-label">Position:</label>
                                        <input type="text" class="form-control" name="position" value="<?php echo $dbposition; ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="expert" class="col-form-label">Expert:</label>
                                        <input type="text" class="form-control" name="expert" value="<?php echo $dbexpert; ?>">
                                      </div>
                                      <!-- <div class="form-group">
                                            <label for="expert" class="col-form-label">Phone Number:</label>
                                            <input type="text" class="form-control" name="phone" value="<?php echo $row['phonenumber']; ?>">
                                          </div> -->
                                      <div class="form-group">
                                        <label for="office" class="col-form-label">Office:</label>
                                        <input type="text" class="form-control" name="office" value="<?php echo $dboffice; ?>">
                                      </div>
                                      <!-- <div class="form-group">
                                            <label for="expert" class="col-form-label">Address:</label>
                                            <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>">
                                          </div> -->

                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <input type="hidden" name="pid" value="<?php echo $dbpid; ?>">
                                      <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            </td>

                          </div>
                        </div>
                      </div>
                      <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                              </svg>Website</h6>
                            <span class="text-secondary">-</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline">
                                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                              </svg>Github</h6>
                            <span class="text-secondary">-</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                              </svg>Twitter</h6>
                            <span class="text-secondary">-</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                              </svg>Instagram</h6>
                            <span class="text-secondary">-</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                              </svg>Facebook</h6>
                            <span class="text-secondary">-</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="card mb-3">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <?php echo $dbtitle . " " . $dbfirstname . " " . $dblastname; ?>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <?php echo $varEmail; ?>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Position</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <?php echo $dbposition; ?>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Expert</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <?php echo $dbexpert; ?>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              -
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Office</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <?php echo $dboffice; ?>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              -
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Created</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <?php echo $dbcreated_at; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="row gutters-sm">
                            <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                                <small>Web Design</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Website Markup</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>One Page</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Mobile Template</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Backend API</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                                <small>Web Design</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Website Markup</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>One Page</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Mobile Template</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Backend API</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div> -->
                    </div>
                  </div>
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