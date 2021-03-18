<?php
session_start();

if (!isset($_SESSION['email'])) {
  header("location: login.php");
}

include '../connectdb.php';

$result = mysqli_query($connect, "SELECT * FROM booking ");

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
                      if($_SESSION['level'] == 'u'){
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
                      if($_SESSION['level'] == 'p'){
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['picture'] ).'" class= "img-profile rounded-circle" height="50px" width="50px" class="img-thumnail" />';
                      }
                      else{
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
                      if($_SESSION['level'] == 'p'){?>
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

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />

              <div class="container">
                  <div class="row">
                      <div class="col-lg-9">
                          <div class="box shadow-sm rounded bg-white mb-3">
                              <div class="box-title border-bottom p-3">
                                  <h6 class="m-0">Recent</h6>
                              </div>
                              <div class="box-body p-0">
                                  <div class="p-3 d-flex align-items-center bg-light border-bottom osahan-post-header">
                                      <div class="dropdown-list-image mr-3">
                                          <img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" />
                                      </div>
                                      <div class="font-weight-bold mr-3">
                                          <div class="text-truncate">DAILY RUNDOWN: WEDNESDAY</div>
                                          <div class="small">Income tax sops on the cards, The bias in VC funding, and other top news for you</div>
                                      </div>
                                      <span class="ml-auto mb-auto">
                                          <div class="btn-group">
                                              <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="mdi mdi-dots-vertical"></i>
                                              </button>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                                              </div>
                                          </div>
                                          <br />
                                          <div class="text-right text-muted pt-1">3d</div>
                                      </span>
                                  </div>
                                  <div class="p-3 d-flex align-items-center osahan-post-header">
                                      <div class="dropdown-list-image mr-3">
                                          <img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                                      </div>
                                      <div class="font-weight-bold mr-3">
                                          <div class="mb-2">We found a job at askbootstrap Ltd that you may be interested in Vivamus imperdiet venenatis est...</div>
                                          <button type="button" class="btn btn-outline-success btn-sm">View Jobs</button>
                                      </div>
                                      <span class="ml-auto mb-auto">
                                          <div class="btn-group">
                                              <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="mdi mdi-dots-vertical"></i>
                                              </button>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                                              </div>
                                          </div>
                                          <br />
                                          <div class="text-right text-muted pt-1">4d</div>
                                      </span>
                                  </div>
                              </div>
                          </div>
                          <div class="box shadow-sm rounded bg-white mb-3">
                              <div class="box-title border-bottom p-3">
                                  <h6 class="m-0">Earlier</h6>
                              </div>
                              <div class="box-body p-0">
                                  <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                                      <div class="dropdown-list-image mr-3 d-flex align-items-center bg-danger justify-content-center rounded-circle text-white">DRM</div>
                                      <div class="font-weight-bold mr-3">
                                          <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                          <div class="small">Nunc purus metus, aliquam vitae venenatis sit amet, porta non est.</div>
                                      </div>
                                      <span class="ml-auto mb-auto">
                                          <div class="btn-group">
                                              <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="mdi mdi-dots-vertical"></i>
                                              </button>
                                              <div class="dropdown-menu dropdown-menu-right" style="">
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                                              </div>
                                          </div>
                                          <br />
                                          <div class="text-right text-muted pt-1">3d</div>
                                      </span>
                                  </div>
                                  <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                                      <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" /></div>
                                      <div class="font-weight-bold mr-3">
                                          <div class="text-truncate">DAILY RUNDOWN: SATURDAY</div>
                                          <div class="small">Pellentesque semper ex diam, at tristique ipsum varius sed. Pellentesque non metus ullamcorper</div>
                                      </div>
                                      <span class="ml-auto mb-auto">
                                          <div class="btn-group">
                                              <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="mdi mdi-dots-vertical"></i>
                                              </button>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                                              </div>
                                          </div>
                                          <br />
                                          <div class="text-right text-muted pt-1">3d</div>
                                      </span>
                                  </div>
                                  <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                                      <div class="dropdown-list-image mr-3">
                                          <img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" />
                                      </div>
                                      <div class="font-weight-bold mr-3">
                                          <div class="mb-2"><span class="font-weight-normal">Congratulate Gurdeep Singh Osahan (iamgurdeeposahan)</span> for 5 years at Askbootsrap Pvt.</div>
                                          <button type="button" class="btn btn-outline-success btn-sm">Say congrats</button>
                                      </div>
                                      <span class="ml-auto mb-auto">
                                          <div class="btn-group">
                                              <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="mdi mdi-dots-vertical"></i>
                                              </button>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                                              </div>
                                          </div>
                                          <br />
                                          <div class="text-right text-muted pt-1">4d</div>
                                      </span>
                                  </div>
                                  <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                                      <div class="dropdown-list-image mr-3">
                                          <img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="" />
                                      </div>
                                      <div class="font-weight-bold mr-3">
                                          <div>
                                              <span class="font-weight-normal">Congratulate Mnadeep singh (iamgurdeeposahan)</span> for 4 years at Askbootsrap Pvt.
                                              <div class="small text-success"><i class="fa fa-check-circle"></i> You sent Mandeep a message</div>
                                          </div>
                                      </div>
                                      <span class="ml-auto mb-auto">
                                          <div class="btn-group">
                                              <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="mdi mdi-dots-vertical"></i>
                                              </button>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                                              </div>
                                          </div>
                                          <br />
                                          <div class="text-right text-muted pt-1">4d</div>
                                      </span>
                                  </div>
                                  <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                                      <div class="dropdown-list-image mr-3 d-flex align-items-center bg-success justify-content-center rounded-circle text-white">M</div>
                                      <div class="font-weight-bold mr-3">
                                          <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                          <div class="small">Nunc purus metus, aliquam vitae venenatis sit amet, porta non est.</div>
                                      </div>
                                      <span class="ml-auto mb-auto">
                                          <div class="btn-group">
                                              <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="mdi mdi-dots-vertical"></i>
                                              </button>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                                              </div>
                                          </div>
                                          <br />
                                          <div class="text-right text-muted pt-1">3d</div>
                                      </span>
                                  </div>
                                  <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                                      <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" /></div>
                                      <div class="font-weight-bold mr-3">
                                          <div class="text-truncate">DAILY RUNDOWN: SATURDAY</div>
                                          <div class="small">Pellentesque semper ex diam, at tristique ipsum varius sed. Pellentesque non metus ullamcorper</div>
                                      </div>
                                      <span class="ml-auto mb-auto">
                                          <div class="btn-group">
                                              <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="mdi mdi-dots-vertical"></i>
                                              </button>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                                              </div>
                                          </div>
                                          <br />
                                          <div class="text-right text-muted pt-1">3d</div>
                                      </span>
                                  </div>
                                  <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                                      <div class="dropdown-list-image mr-3">
                                          <img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                                      </div>
                                      <div class="font-weight-bold mr-3">
                                          <div class="mb-2"><span class="font-weight-normal">Congratulate Gurdeep Singh Osahan (iamgurdeeposahan)</span> for 5 years at Askbootsrap Pvt.</div>
                                          <button type="button" class="btn btn-outline-success btn-sm">Say congrats</button>
                                      </div>
                                      <span class="ml-auto mb-auto">
                                          <div class="btn-group">
                                              <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="mdi mdi-dots-vertical"></i>
                                              </button>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                                              </div>
                                          </div>
                                          <br />
                                          <div class="text-right text-muted pt-1">4d</div>
                                      </span>
                                  </div>
                                  <div class="p-3 d-flex align-items-center osahan-post-header">
                                      <div class="dropdown-list-image mr-3">
                                          <img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" />
                                      </div>
                                      <div class="font-weight-bold mr-3">
                                          <div>
                                              <span class="font-weight-normal">Congratulate Mnadeep singh (iamgurdeeposahan)</span> for 4 years at Askbootsrap Pvt.
                                              <div class="small text-success"><i class="fa fa-check-circle"></i> You sent Mandeep a message</div>
                                          </div>
                                      </div>
                                      <span class="ml-auto mb-auto">
                                          <div class="btn-group">
                                              <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="mdi mdi-dots-vertical"></i>
                                              </button>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                                  <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                                              </div>
                                          </div>
                                          <br />
                                          <div class="text-right text-muted pt-1">4d</div>
                                      </span>
                                  </div>
                              </div>
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