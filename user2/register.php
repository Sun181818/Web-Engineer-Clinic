<?php

    session_start();

    require_once '../connectdb.php';

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email_check = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($connect,$email_check);
        $user_email = mysqli_fetch_assoc($result);

        $username_check = "SELECT * FROM user WHERE user_name = '$username' LIMIT 1";
        $result = mysqli_query($connect,$username_check);
        $user_username = mysqli_fetch_assoc($result);

        if($user_email['email'] === $email) {
            echo "<script>alert('Email already exists');</script>";
        }
        else if($user_username['user_name'] === $username) {
            echo "<script>alert('Username already exists');</script>";
        }
        else{
            $passwordenc = md5($password);
            $date = date('Y-m-d H:i:s');
            $query = "INSERT INTO user (user_name,email,password,level,created) VALUE('$username','$email','$passwordenc','u','$date')";
            $result = mysqli_query($connect,$query);

            if($result) {
                $_SESSION['success'] = "Insert user successfully";
                header("location: login.php");
            }
            else{
                $_SESSION['error'] = "Someting went wrong";
                header("location: login.php");
            }
        }
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

  <title>Engineering Clinic - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/Engineer-Clinic.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-info">

  <div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-7 col-lg-8 col-md-3">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name ="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name ="email" placeholder="Email Address" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" name ="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-info btn-user btn-block" name ="submit" value ="Register" >
                </div>
                <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a> -->
              </form>
              <hr>
              <!-- <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div> -->
              <div class="text-center">
                <a class="small text-info" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/Engineer-Clinic.min.js"></script>

</body>

</html>
