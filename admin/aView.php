<?php
include '../connectdb.php';
session_start();

if (!isset($_SESSION['email'])) {
  header("location: login.php");
}

//question
$sql = "SELECT * FROM questions WHERE id='{$_GET['id']}' ";
$query = mysqli_query($connect, $sql);
$result = mysqli_fetch_assoc($query);

// answer
$sql_a = "SELECT * FROM answers WHERE question_id='{$_GET['id']}' ";
$query_a = mysqli_query($connect, $sql_a);
$rows_a = mysqli_num_rows($query_a);

// update view
$sql_u = "UPDATE questions SET view=view+1 WHERE id='{$_GET['id']}' ";
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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>
          <!-- Content Row -->
          <div class="row">
            <div class="card-body">
              <!--<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Topic</th>
                      <th>Detail</th>
                      <th>Email</th>
                      <th>Date Post</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($row = mysqli_fetch_array($result)) : ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['topic']; ?></td>
                        <td><?php echo $row['detail']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['created']; ?></td>


                        edit
                        <td><button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#update_post_Modal<?php echo $row['id']; ?>" data-whatever="@mdo"><i class="fas fa-edit"></i></button>
                          <div class="modal fade" id="update_post_Modal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="update_post_ModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="update_post_ModalLabel<?php echo $row['id']; ?>">Edit</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="edit_post.php" method="post">
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label for="topic" class="col-form-label">Topic:</label>
                                      <input type="text" class="form-control" name="topic" value="<?php echo $row['topic']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="detail" class="col-form-label">Detail:</label>
                                      <input type="text" class="form-control" name="detail" value="<?php echo $row['detail']; ?>" required>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn btn-info">Save</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </td>//-->


              <!-- view -->
              <td>
                <!--<button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#view_post_Modal<?php echo $row['id']; ?>" data-whatever="@mdo"><i class="fas fa-edit"></i></button>

                          <div class="modal fade" id="view_post_Modal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="view_post_ModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="view_post_ModalLabel<?php echo $row['id']; ?>">Are you sure to delete?</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>ID : <?php echo $row['id']; ?></p>
                                  <p>Topic : <?php echo $row['topic']; ?></p>
                                  <p>Detail : <?php echo $row['detail']; ?></p>
                                  <p>Email : <?php echo $row['email']; ?></p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  <a href="view_topic.php?id=<?php echo $row['id']; ?>" class="btn btn-info">
                                    Confirm
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>//-->
                <a href="view_topic.php?id=<?php echo $row['id']; ?>" class="btn btn-info">
                  View
                </a>
              </td>


              <!-- delete 
                        <td><button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#delete_post_Modal<?php echo $row['id']; ?>">
                            <i class="fas fa-trash"></i>
                          </button>

                          <div class="modal fade" id="delete_post_Modal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="delete_post_ModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="delete_post_ModalLabel<?php echo $row['id']; ?>">Are you sure to delete?</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>ID : <?php echo $row['id']; ?></p>
                                  <p>Topic : <?php echo $row['topic']; ?></p>
                                  <p>Detail : <?php echo $row['detail']; ?></p>
                                  <p>Email : <?php echo $row['email']; ?></p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  <a href="delete_post.php?id=<?php echo $row['id']; ?>" class="btn btn-info">
                                    Confirm
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php endwhile; ?>

                    <tr>
                      <td><button type="button" class="btn btn-success btn-circle btn-sm" data-toggle="modal" data-target="#add_post_Modal" data-whatever="@mdo"><i class="fas fa-plus"></i></button>

                        <div class="modal fade" id="add_post_Modal" tabindex="-1" role="dialog" aria-labelledby="add_post_ModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="add_post_ModalLabel">New Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="add_new_topic.php" method="post">
                                <div class="modal-body">

                                  <div class="form-group">
                                    <label for="topic" class="col-form-label">Topic:</label>
                                    <input type="text" class="form-control" name="topic" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="detail" class="col-form-label">Detail:</label>
                                    <textarea class="form-control" aria-label="With textarea" name="detail" required></textarea>
                                  </div>
                                  <div class="form-group">
                                    <input type="hidden" class="form-control" value="<?php echo $_SESSION['email']; ?>" name="email" aria-label="Disabled input example">
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-info">Confirm</button>
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
              </div>//-->

              <table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
                <tr>
                  <td>
                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                      <tr>
                        <td colspan="3" bgcolor="#000000">
                          <b style="color: #FFFFFF;font-size:32px;"><?php echo $result['topic']; ?></b>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>Email:</strong><?php echo $result['email']; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>Detail:</strong><?php echo $result['detail']; ?>
                        </td>
                      </tr>

                      <tr>
                        <td style="text-align: right;">
                          <strong>Date:</strong> <?php echo $result['created']; ?>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              <?php
              if ($rows_a > 0) {
                $i = 1;
                while ($result_a = mysqli_fetch_assoc($query_a)) {
              ?>
                  <table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000" style="margin-top:10px;">
                    <tr>
                      <td>
                        <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                          <!--<tr>
                            <td width="30%" style="text-align: right;"><strong>Name</strong></td>
                            <td width="70%"><?php echo $result_a['name']; ?></td>
                          </tr>
                          <tr>
                            <td valign="top" style="text-align: right;"><strong>Email</strong></td>
                            <td><?php echo $result_a['email']; ?></td>
                          </tr>//-->
                          <tr>
                            <!--<td style="text-align: left;"><strong>Comment: </strong><?php echo nl2br($result_a['detail']); ?></td>
                            <td style="text-align: center;"><?php echo nl2br($result_a['detail']); ?>
                            </td>-->
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                <?php
                }
              } else {
                ?>
                <!--<p style="text-align: center;color: red;"><?php echo nl2br($result['reply']); ?><strong> Interested</strong></p>-->
              <?php
              }
              ?>

              <!--<form id="add_answer" name="add_answer" method="post" action="add_answer.php">
                <table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="blue" style="margin-top:15px;">
                  <tr>
                    <td>
                      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                        <tr>
                          <td colspan="3" bgcolor="#47d1d1"><b style="color: #FFFFFF;">Answer Question</b> </td>
                        </tr>
                        <tr>
                          <td valign="top" style="text-align: right;"><strong>Detail</strong></td>
                          <td><textarea name="detail" cols="50" rows="5" id="detail"></textarea></td>
                        </tr>
                        <tr>
                          <td style="text-align: right;"><strong>Name</strong></td>
                          <td><input name="name" type="text" id="name" size="50" /></td>
                        </tr>
                        <tr>
                          <td style="text-align: right;"><strong>Email</strong></td>
                          <td><input name="email" type="text" id="email" size="50" /></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>
                            <input type="submit" name="submit" value="Save" class="btn btn-info" />
                            <input type="reset" name="Submit2" value="Clear" class="btn btn-info" />
                            <a href="index.php?id=<?php echo $row['id']; ?>" class="btn btn-info">
                              Back
                            </a>
                            <input type="button" name="Submit2" value="Back" onclick="header("Location: index.php")" />
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
                <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
              </form>-->
              <!--accept
            </div>
            <tr>
              <div class="col-12">
                <td>

                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#accept_post_Modal" data-whatever="@mdo"><i>Accept Request</i></button>
                  <div class="modal fade" id="accept_post_Modal" tabindex="-1" role="dialog" aria-labelledby="accept_post_ModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="accept_post_ModalLabel">Accept request</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="accept_topic.php" method="post">
                          <div class="modal-body">
                            <label style="text-align:center" class="col-form-label">Are you sure to accept this request</label>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-info">Confirm</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </td>
              </div>
            </tr>-->

              <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#accept_post_Modal" data-whatever="@mdo">Accept Request</button>
                <div class="modal fade" id="accept_post_Modal" tabindex="-1" role="dialog" aria-labelledby="accept_post_ModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="accept_post_ModalLabel">Accept request</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="accept_topic.php" method="post">
                        <div class="modal-body">
                          <label class="col-form-label">Are you sure to accept this request</label>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Confirm</button>
                          </div>
                      </form>
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
                    <span aria-hidden="true">?</span>
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
