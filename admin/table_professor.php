<?php
session_start();

if (!isset($_SESSION['email'])) {
  header("location: login.php");
}


include '../connectdb.php';

$result = mysqli_query($connect, "SELECT * FROM professor WHERE status = '1'");
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
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>


          <!-- DataProfressor  -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Profressor</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Picture</th>
                      <th>PID</th>
                      <th>UID</th>
                      <th>Name</th>
                      <th>Expert</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Free Time</th>
                      <!-- <th>Email</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($row = mysqli_fetch_array($result)) : ?>
                      <tr>
                        <td><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['picture']) . '"  class= "img-profile rounded-circle" height="50px" width="50px"/>'; ?></td>
                        <td><?php echo $row['pid']; ?></td>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['title'] . " " . $row['firstname'] . " " . $row['lastname']; ?></td>
                        <td><?php echo $row['expert']; ?></td>
                        <td><?php echo $row['position']; ?></td>
                        <td><?php echo $row['office']; ?></td>
                        <td><?php echo $row['free_time']; ?></td>

                        <!-- edit -->
                        <td><button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#update_professor_Modal<?php echo $row['pid']; ?>" data-whatever="@mdo"><i class="fas fa-edit"></i></button>
                          <div class="modal fade" id="update_professor_Modal<?php echo $row['pid']; ?>" tabindex="-1" role="dialog" aria-labelledby="update_professor_ModalLabel<?php echo $row['pid']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="update_professor_ModalLabel<?php echo $row['pid']; ?>">Edit</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="update_process.php" method="post">
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label for="title" class="col-form-label">Title</label>
                                      <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="firstname" class="col-form-label">Name</label>
                                      <input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname']; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="lastname" class="col-form-label">Name</label>
                                      <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname']; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="expert" class="col-form-label">Expert</label>
                                      <input type="text" class="form-control" name="expert" value="<?php echo $row['expert']; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="position" class="col-form-label">Position</label>
                                      <input type="text" class="form-control" name="position" value="<?php echo $row['position']; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="office" class="col-form-label">Office</label>
                                      <input type="text" class="form-control" name="office" value="<?php echo $row['office']; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="free_time" class="col-form-label">Convenient date and time</label>
                                      <input type="text" class="form-control" name="free_time" value="<?php echo $row['free_time']; ?>">
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </td>



                        <!-- delete -->
                        <td><button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#delete_professor_Modal<?php echo $row['pid']; ?>">
                            <i class="fas fa-trash"></i>
                          </button>

                          <div class="modal fade" id="delete_professor_Modal<?php echo $row['pid']; ?>" tabindex="-1" role="dialog" aria-labelledby="delete_professor_ModalLabel<?php echo $row['pid']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="delete_professor_ModalLabel<?php echo $row['pid']; ?>">Are you sure to delete?</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>ID : <?php echo $row['pid']; ?></p>
                                  <p>Title : <?php echo $row['title']; ?></p>
                                  <p>Profess_name : <?php echo $row['firstname'] . " " . $row['lastname']; ?></p>
                                  <p>Expert : <?php echo $row['expert']; ?></p>
                                  <p>Position : <?php echo $row['position']; ?></p>
                                  <p>Office : <?php echo $row['office']; ?></p>
                                  <p>Email : <?php echo $row['email']; ?></p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  <form action="delete_process.php" method="post">
                                    <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                                    <input type="hidden" name="pid2" value="<?php echo $row['pid']; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                  </form>
                                  <!-- <a href="delete_process.php?uid=<?php echo $row['pid']; ?>" class="btn btn-primary">
                                    Confirm
                                  </a> -->
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php endwhile; ?>

                    <tr>
                      <!-- <td><button type="button" class="btn btn-success btn-circle btn-sm" data-toggle="modal" data-target="#add_professor_Modal" data-whatever="@mdo"><i class="fas fa-plus"></i></button> -->

                      <div class="modal fade" id="add_professor_Modal" tabindex="-1" role="dialog" aria-labelledby="add_professor_ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="add_professor_ModalLabel">Add professor</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="add_process.php" method="post">
                              <div class="modal-body">

                                <div class="form-group">
                                  <label for="email" class="col-form-label">Email:</label>
                                  <input type="text" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                  <label for="password" class="col-form-label">Password:</label>
                                  <input type="password" class="form-control" name="password">
                                </div>

                                <div class="form-group">
                                  <label for="title" class="col-form-label">Title:</label>
                                  <input type="text" class="form-control" name="title">
                                </div>
                                <div class="form-group">
                                  <label for="user_name" class="col-form-label">Name:</label>
                                  <input type="text" class="form-control" name="user_name">
                                </div>
                                <div class="form-group">
                                  <label for="expert" class="col-form-label">Expert:</label>
                                  <input type="text" class="form-control" name="expert">
                                </div>
                                <div class="form-group">
                                  <label for="position" class="col-form-label">Position:</label>
                                  <input type="text" class="form-control" name="position">
                                </div>
                                <div class="form-group">
                                  <label for="office" class="col-form-label">Office:</label>
                                  <input type="text" class="form-control" name="office">
                                </div>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      </td>
                    </tr>

                  </tbody>
                </table>
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
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>
  <script src="../js/demo/datatables-demo.js"></script>


</body>

</html>