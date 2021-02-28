<?php include '../connectdb.php';
    //require 'connectdb.php'?>
<?php

    //print_r($_POST['title']);
    $rid = $_POST['rid'];
    $status = $_POST['status'];

    $q = "UPDATE request SET status = '$status' WHERE rid = '$rid'";


    $result = mysqli_query($connect, $q );

    if($status == '2') {

        $title = $_POST['title'];
        $expert = $_POST['expert'];
        $position = $_POST['position'];
        $office = $_POST['office'];
        $email = $_POST['email'];

        $query = "UPDATE user SET title = '$title', expert = '$expert', position = '$position', office = '$office',level = 'p' WHERE email = '$email'";
        $result = mysqli_query($connect,$query);
            if($result) {
                $_SESSION['success'] = "Insert user successfully";
                header("location: approve_professor.php");
            }
            else{
                $_SESSION['error'] = "Someting went wrong";
                header("location: approve_professor.php");
            }
      }
    else {
        echo "Fail" . mysqli_error($connect);
    }




    mysqli_close($connect);
?>