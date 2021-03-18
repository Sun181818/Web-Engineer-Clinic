<?php include '../connectdb.php';

    //print_r($_POST['title']);
    $pid = $_POST['pid'];
    $uid = $_POST['uid'];
    $status = $_POST['status'];

    $q = "UPDATE professor SET status = '$status' WHERE pid = '$pid'";
    $result = mysqli_query($connect, $q );

    $q = "UPDATE user SET level = 'p' WHERE uid = '$uid'";
    $result = mysqli_query($connect, $q );

    if($result) {

        $_SESSION['success'] = "Insert user successfully";
        header("location: approve_professor.php");
    }
    else{
        $_SESSION['error'] = "Someting went wrong";
        header("location: approve_professor.php");
    }

    mysqli_close($connect);
?>