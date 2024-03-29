<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("location: login.php");
}

include '../connectdb.php';

$varUID = $_SESSION['uid'];

$result = mysqli_query($connect, "SELECT * FROM webboard order by created desc");
$user_result = mysqli_query($connect, "SELECT * FROM webboard where uid = '$varUID' order by created desc");

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

                <div style="position: fixed; bottom: 13px; right: 70px;">
                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_post_Modal" data-whatever="@mdo"><h5>Create Post</h5></button>
                </div>
                <!-- Begin Page Content -->
                <div class="container-fluid" style="min-height: 100vh;">
                    <!-- Page Heading -->

                    <!-- Content Row -->
                    <?php if ($_SESSION['level'] == 'p' || $_SESSION['level'] == 'a') { ?>
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-12 col-md-9">
                                <div class="d-flex flex-row-reverse">
                                    <tr>
                                        <div class="modal fade" id="add_post_Modal" tabindex="-1" role="dialog" aria-labelledby="add_post_ModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="add_post_ModalLabel">New Post</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="add_new_topic.php" method="post" enctype="multipart/form-data">
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
                                                            <div class="form-group">
                                                                <label for="picture" class="col-form-label">Picture:</label>
                                                                <input type="file" class="form-control form-control-user" name="image">
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
                                    </tr>
                                </div>
                                <?php while ($row = mysqli_fetch_array($result)) : ?>
                                    <?php
                                    $date = date_create($row['created']);
                                    $dbuid = $row['uid'];
                                    $dbuser = mysqli_query($connect, "SELECT * FROM user Where uid = '$dbuid'");
                                    while ($user = mysqli_fetch_array($dbuser)) : ?>
                                        <div class="card shadow mb-2">
                                            <div class="card-header py-3">
                                                <a href="view_topic.php?wid=<?php echo $row['wid']; ?>" class="m-0 font-weight-bold text-primary"><?php echo $row['topic']; ?></a>
                                                <div class="float-right">
                                                    &nbsp;&nbsp;
                                                    <?php echo date_format($date, 'd-F-Y'); ?>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div style="height: 50px;">
                                                    <?php
                                                    if ($_SESSION['level'] == 'p' || $_SESSION['level'] == 'u') {
                                                        echo '<img class="img-profile rounded-circle p-2" src="../img/profile.jpg" height="50px" width="50px" >';
                                                    }
                                                    // } else {
                                                    //     echo '<img src="data:image/jpeg;base64,' . base64_encode($user['picture']) . '" class= "img-profile rounded-circle p-2 " height="auto" width="50px" class="img-thumnail" />';
                                                    // }
                                                    ?>
                                                    &nbsp;&nbsp;
                                                    <?php echo $user['user_name']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php
                    } else { ?>
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-12 col-md-9">
                                <div class="d-flex flex-row-reverse">
                                    <tr>
                                        <div class="modal fade" id="add_post_Modal" tabindex="-1" role="dialog" aria-labelledby="add_post_ModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="add_post_ModalLabel">New Post</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="add_new_topic.php" method="post" enctype="multipart/form-data">
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
                                                            <div class="form-group">
                                                                <label for="picture" class="col-form-label">Picture:</label>
                                                                <input type="file" class="form-control form-control-user" name="image">
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
                                    </tr>
                                </div>
                                <?php while ($row = mysqli_fetch_array($user_result)) : ?>
                                    <?php
                                    $date = date_create($row['created']);
                                    $dbuid = $row['uid'];
                                    $dbuser = mysqli_query($connect, "SELECT * FROM user Where uid = '$dbuid'");
                                    while ($user = mysqli_fetch_array($dbuser)) : ?>
                                        <div class="card shadow mb-2">
                                            <div class="card-header py-3">
                                                <a href="view_topic.php?wid=<?php echo $row['wid']; ?>" class="m-0 font-weight-bold text-primary"><?php echo $row['topic']; ?></a>
                                                <div class="float-right">
                                                    &nbsp;&nbsp;
                                                    <?php echo date_format($date, 'd-F-Y'); ?>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div style="height: 50px;">
                                                    <?php
                                                    if ($_SESSION['level'] == 'p' || $_SESSION['level'] == 'u') {
                                                        echo '<img class="img-profile rounded-circle p-2" src="../img/profile.jpg" height="50px" width="50px" >';
                                                    }
                                                    // } else {
                                                    //     echo '<img src="data:image/jpeg;base64,' . base64_encode($user['picture']) . '" class= "img-profile rounded-circle p-2 " height="auto" width="50px" class="img-thumnail" />';
                                                    // }
                                                    ?>
                                                    &nbsp;&nbsp;
                                                    <?php echo $user['user_name']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <!-- End of Main Content -->
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